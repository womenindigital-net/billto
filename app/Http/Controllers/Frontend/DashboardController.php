<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\SendMail_info;
use App\Models\InvoiceTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class DashboardController extends Controller
{

    public function allInvoice()
    {
        $user_id = Auth::user()->id;
        $invoicessData = Invoice::where('user_id', Auth::user()->id)->get(['id', 'invoice_to', 'invoice_id', 'invoice_date', 'total', 'template_name', 'currency']);
        $user = User::where('id', $user_id)->get();
        $Total_Amount_conut = Invoice::where('user_id', $user_id)->where('invoice_status', 'complete')->sum('final_total');
        $due_Amount_conut = Invoice::where('user_id', $user_id)->where('invoice_status', 'complete')->sum('final_total');
        $paid_Amount_conut = Invoice::where('user_id', $user_id)->where('invoice_status', 'complete')->sum('final_total');
        $latestDataInvoices = Invoice::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->limit(7)->get();
        return view('frontend.all-invoice')->with(compact('invoicessData', 'user', 'Total_Amount_conut', 'latestDataInvoices'));
    }



    public function edit($id)
    {
        $template_id = "";
        $invoice_template = InvoiceTemplate::get();
        $template_id_check = InvoiceTemplate::get()->first();
        $invoiceData = Invoice::where('id', $id)->get(['id', 'invoice_logo', 'invoice_form', 'invoice_to', 'invoice_id', 'invoice_date', 'invoice_payment_term', 'invoice_dou_date', 'invoice_po_number', 'invoice_notes', 'invoice_terms', 'invoice_tax_percent', 'requesting_advance_amount_percent', 'receive_advance_amount', 'total', 'currency', 'invoice_tax_percent', 'receive_advance_amount', 'discount_percent'])->first();
        $invoiceCount = Invoice::where('user_id', Auth::user()->id)->count();
        $sendByMail_count = SendMail_info::where('user_id', $id)->count();
        $Total_Amount_conut = Invoice::where('user_id', $id)->where('invoice_status', 'complete')->sum('final_total');
        $requesting_advance_amount = ($invoiceData->total * $invoiceData->requesting_advance_amount_percent) / 100;
        $invoiceCountNew = Invoice::where('user_id', Auth::user()->id)->count();
        $invoiceCountNew += 0;
        $user_logo_terms = User::where('id', Auth::user()->id)->get([
            'invoice_logo',
            'terms',
        ])->first();

        return view('frontend.create-invoice')->with(compact('invoiceData', 'user_logo_terms', 'invoiceCount', 'requesting_advance_amount', 'template_id', 'invoice_template', 'template_id_check', 'sendByMail_count', 'Total_Amount_conut', 'invoiceCountNew'));
    }



    public function destroy($id)
    {
        $invoiceData = Invoice::find($id);
        $image_path         = public_path("storage\invoice\logo\\") . $invoiceData->invoice_logo;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $invoiceData->delete();
        return response()->json(['message' => 'Delete Success']);
    }



    //user dashboard setting
    public function userSettingEdit()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('frontend.dashboard.setting', compact('user'));
    }



    public function userUpdate(UpdateUserRequest $request, $id)
    {
        $get_id = $id;
        $user = User::find($get_id);;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
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
        return redirect()->back()->with('success', 'Successfully updated.');
    }




    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        // #Update the new Password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        Auth::logout();
        return back()->with("success", "Password changed successfully!");
    }


    /////dashboard send by mail
    public function SendByMail()
    {
        $user_id = auth()->user()->id;
        $sendByMails = SendMail_info::where('user_id', $user_id)->latest()->get();
        return view('frontend.dashboard.sendByMail', compact('sendByMails'));
    }



    public function user_view_tamplate($id)
    {
        $data  = Invoice::find($id);
        $userLogoAndTerms = User::where('id', Auth::user()->id)->get([
            'invoice_logo',
            'terms',
        ]) ->first();
        $productsDatas = Product::where('invoice_id', $id)->get();
        return view('invoices.preview_invoice.all_pre_invoice', compact('data', 'productsDatas','userLogoAndTerms'))->render();
    }



    public function search_result(Request $request)
    {
        $request->validate([
            'to_date' => 'required',
            'from_date' => 'required',
            'invoice_status' => 'required'
        ]);
        $all_Invoice_Count = Invoice::where('user_id', Auth::user()->id)->count();
        $search_result = Invoice::whereBetween('invoice_date', [$request->from_date, $request->to_date])->where('status_due_paid', $request->invoice_status)->where('user_id', Auth::user()->id)->get();
        return view('frontend.dashboard.search_result_all_invoice')->with(compact('search_result', 'all_Invoice_Count'));
    }
}
