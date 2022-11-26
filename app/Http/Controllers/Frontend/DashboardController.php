<?php

namespace App\Http\Controllers\frontend;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class DashboardController extends Controller
{
    public function allInvoice()
    {
        $user_id = Auth::user()->id;
        Invoice::where('user_id', $user_id)->where('invoice_status','incomlete')->delete();

        $invoicessData = Invoice::where('user_id', Auth::user()->id)->get(['id', 'invoice_to', 'invoice_id', 'invoice_date', 'total']);
        $count = $invoicessData->count();

        $user = User::where('id',$user_id)->get();
        return view('frontend.all-invoice')->with(compact('invoicessData', 'count','user'));
    }

    public function edit($id)
    {
        $invoiceData = Invoice::where('id', $id)->get(['id', 'invoice_logo', 'invoice_form', 'invoice_to', 'invoice_id', 'invoice_date', 'invoice_payment_term', 'invoice_dou_date', 'invoice_po_number', 'invoice_notes', 'invoice_terms', 'invoice_tax_percent', 'requesting_advance_amount_percent', 'receive_advance_amount', 'total', 'currency'])->first();
        $invoiceCount = Invoice::where('user_id', Auth::user()->id)->count();
        $requesting_advance_amount = ($invoiceData->total*$invoiceData->requesting_advance_amount_percent)/100;
        // foreach ($productData as $key => $value) { echo $value; };
        return view('frontend.create-invoice')->with(compact('invoiceData', 'invoiceCount', 'requesting_advance_amount'));
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
    public function userSettingEdit(){
        $user_id = auth()->user()->id;
        $user = User::where('id',$user_id)->get();

        return view('frontend.dashboard.setting',compact('user'));
    }
    public function userUpdate(UpdateUserRequest $request, $id){
        $get_id = $id;
        $user = User::find($get_id);;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
        if ($request->hasFile('picture__input')) {
            $path = 'uploads/userImage/' . $user->picture__input;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('picture__input');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/userImage/', $filename);
            $user->picture__input = $filename;
        }
        $user->update();
        return redirect()->back()->with('message', 'Successfully Update User profile.');
    }
}
