<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\InvcPymntTransction;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\SendMail_info;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends BaseController
{
    public function index(Request $request)
    {
        $user_id =  $request->user()->id;

        $invoicessData = Invoice::where('user_id', $user_id)->get(['id', 'invoice_to', 'invoice_id', 'invoice_date', 'total', 'template_name', 'currency']);
        $user = User::where('id', $user_id)->get();
        $Total_Amount_conut = Invoice::where('user_id', $user_id)->where('invoice_status', 'complete')->sum('final_total');
        $due_Amount_conut = Invoice::where('user_id', $user_id)->where('invoice_status', 'complete')->sum('balanceDue_amounts');
        $paid_Amount_conut = Invoice::where('user_id', $user_id)->where('invoice_status', 'complete')->sum('receive_advance_amount');
        $latestDataInvoices = Invoice::where('user_id',  $user_id)->whereIn('status_due_paid', ['paid', 'due'])->orderBy('id', 'DESC')->limit(8)->get();

        //    user package details
        $join_table_value = DB::table('users')
            ->join('payment_getways', 'users.id', '=', 'payment_getways.user_id')
            ->join('subscription_packages', 'payment_getways.subscription_package_id', '=', 'subscription_packages.id')
            ->join('complate_invoice_counts', 'users.id', '=', 'complate_invoice_counts.user_id')
            ->selectRaw('payment_getways.*, subscription_packages.*,complate_invoice_counts.*')
            ->where('users.id',   $user_id)->get();


        return $this->sendResponse(
            [
                'user_id' => $user_id,
                'invoicessData ' => $invoicessData,
                'user_information ' => $user,
                'Total_Amount_conut ' => $Total_Amount_conut,
                'due_Amount_conut ' => $due_Amount_conut,
                'paid_Amount_conut ' => $paid_Amount_conut,
                'latestDataInvoices ' => $latestDataInvoices,
                'join_table_value ' => $join_table_value,
            ],
            ' Verified User.'
        );

        // return view('frontend.all-invoice')->with(compact('join_table_value','invoicessData', 'user', 'Total_Amount_conut', 'due_Amount_conut', 'paid_Amount_conut', 'latestDataInvoices'));

    }

    public function userSettingEdit(Request $request)
    {
        $user_id =  $request->user()->id;
        $user_details = User::where('id', $user_id)->get();

        return $this->sendResponse(['user_details' => $user_details], ' Verified User.');

        // return view('frontend.dashboard.setting', compact('user'));
    }


    public function userUpdate(Request $request)
    {
        $user_id =  $request->user()->id;
        $validation =  Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required',
        ]);

        $user = User::find($user_id);

        if ($validation->fails()) {
            return $this->sendError('validation Error', $validation->errors());
        }
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('picture__input')) {
            $path = 'uploads/userImage/' . $user->picture__input;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('picture__input');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/userImage/', $filename);
            $user->picture__input = $filename;
        }
        if ($request->hasFile('signature')) {
            $path = 'uploads/signature/' . $user->signature;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('signature');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/signature/', $filename);
            $user->signature = $filename;
        }
        $user->update();


        return $this->sendResponse(['user_details' => $user_id], ' Verified User.');

        // return redirect()->back()->with('success', 'Successfully updated.');
    }

    public function changePassword(Request $request)
    {
        $user_id =  $request->user()->id;

        $validation =  Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password'
        ]);

        $user = User::find($user_id);

        if ($validation->fails()) {
            return $this->sendError('validation Error', $validation->errors());
        }
        if (!Hash::check($request->old_password,  $request->user()->password)) {
            return $this->sendError('validation Error', 'Old password and new password not match');
        }

        // #Update the new Password
        User::whereId($user_id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $request->user()->currentAccessToken()->delete();
        return $this->sendResponse('success', 'password change and logout ');
    }

    public function unpaid_invoice(Request $request)
    {
        $unpaid_Invoice_Counts = Invoice::where('user_id', $request->user()->id)->where('receive_advance_amount', null)->where('invoice_status', 'complete')->orderBy('id', 'DESC')->get();
        return $this->sendResponse($unpaid_Invoice_Counts, 'Verified user ');
    }
    public function pertialy_payment(Request $request)
    {
        $partial_payment_Invoices = Invoice::where('user_id', $request->user()->id)->where('receive_advance_amount', '>', '0')->where('invoice_status', 'complete')->where('status_due_paid', 'due')->orderBy('id', 'DESC')->get();
        return $this->sendResponse($partial_payment_Invoices, 'Verified user ');
    }

    public function over_due_payment(Request $request)
    {
        $last_date = date('Y-m-d');
        $overdue_Invoices = Invoice::where('user_id', $request->user()->id)
            ->where('invoice_dou_date', '<=', $last_date)->where('balanceDue_amounts', '>', 0)->orderBy('id', 'DESC')->get();
        return $this->sendResponse($overdue_Invoices, 'Verified user ');
    }

    public function SendByMail(Request $request)
    {
        $user_id = $request->user()->id;
        $sendByMails_list = SendMail_info::where('user_id', $user_id)->latest()->get();
        return $this->sendResponse($sendByMails_list, 'Verified user ');
    }

    public function user_view_tamplate(Request $request, $id = null)
    {
        $data  = Invoice::find($id);
        $userLogoAndTerms = User::where('id', $request->user()->id)->get([
            'invoice_logo',
            'terms',
            'signature',
        ])->first();
        $productsDatas = Product::where('invoice_id', $id)->get();
        return $this->sendResponse(
            [
                'invoice_data' => $data,
                'userLogoAndTerms' => $userLogoAndTerms,
                'products_Datails' => $productsDatas

            ],
            'Verified user '
        );
    }
    // user due bill payment
    public function user_view_payment(Request $request, $id = null)
    {

        $invoice_data  = Invoice::findOrfail($id);
        return $this->sendResponse(['invoice_data' => $invoice_data], 'Verified user ');
    }
    //payment save

    public function user_payment_save(Request $request)
    {

        $invoice_user_id = $request->user()->id;
        $validation =  Validator::make($request->all(), [
            'amount_id' => 'required',
            'date_id' => 'required',
            'invoice_id' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError('validation Error', $validation->errors());
        }

        if ($request->balanceDue_amounts_user < $request->amount_id) {
            // return redirect()->back()->with('delete', 'Please check due Amount');
            return $this->sendError('Please check due Amount', $validation->errors());
        }

        $receive_advance_amount = $request->amount_id + $request->old_recived_amount;
        $balanceDue_amounts = $request->balanceDue_amounts_user - $request->amount_id;

        $status = "due";
        if ($balanceDue_amounts == 0) {
            $status = "paid";
        }
        Invoice::where('id', $request->invoice_id)->update([
            'receive_advance_amount' => round($receive_advance_amount, 2),
            'balanceDue_amounts' => round($balanceDue_amounts, 2),
            'status_due_paid' => $status
        ]);
        InvcPymntTransction::create([

            'invoice_id' => $request->invoice_id,
            'user_id' => $invoice_user_id,
            'new_payment' => round($request->amount_id, 2),
            'payment_date' => $request->date_id
        ]);

        return $this->sendResponse('payment success', 'Verified user ');
    }
    public function search_result(Request $request)
    {
        $user_id = $request->user()->id;
        $validation =  Validator::make($request->all(), [
            'to_date' => 'required',
            'from_date' => 'required',
            'invoice_status' => 'required'
        ]);
        if ($validation->fails()) {
            return $this->sendError('validation Error', $validation->errors());
        }


        $date_from = $request->from_date;
        $date_to = $request->to_date;
        $invoice_status = $request->invoice_status;
        $all_Invoice_Count = Invoice::where('user_id',  $user_id)->count();
        $search_result = Invoice::whereBetween('invoice_date', [$request->from_date, $request->to_date])->where('status_due_paid', $request->invoice_status)->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

        return $this->sendResponse([
            'all_Invoice_Count_user' => $all_Invoice_Count,
            'search_result' => $search_result,
        ], 'Verified user ');
    }
}
