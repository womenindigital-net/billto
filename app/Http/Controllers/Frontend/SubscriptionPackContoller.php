<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PaymentGetway;
use Illuminate\Support\Facades\DB;
use App\Models\SubscriptionPackage;
use App\Http\Controllers\Controller;
use App\Models\ComplateInvoiceCount;

class SubscriptionPackContoller extends Controller
{
    public function payment_gateway($id)
    {
       $subscribe_package = SubscriptionPackage::where('id',$id)->get();

       $package_tamplate = DB::table('subscription_packages')
       ->join('subscription_package_templates', 'subscription_packages.id', '=', 'subscription_package_templates.subscriptionPackageId')
       ->join('invoice_templates', 'subscription_package_templates.template', '=', 'invoice_templates.id')
       ->where('subscription_packages.id', $id)->get();

        return view('payment_gatewaye.index', compact('subscribe_package','package_tamplate'));
    }

    public function payment_gateway_store(Request $request)
    {

    $request->validate([
        'package_price'=>'required',
        'package_id'=>'required',
        'auth_user_id'=>'required'
    ]);

  $subscriptn_package =  SubscriptionPackage::where('id', $request->package_id)->first();

    if($subscriptn_package->price === $request->package_price){

            PaymentGetway::where('user_id',$request->auth_user_id)->update([
            'amount'=>$request->package_price,
            'subscription_package_id'=> $request->package_id,
            'updated_at' => Carbon::now(),
            ]);

            ComplateInvoiceCount::where('user_id',$request->auth_user_id)->update([
            'current_invoice_total'=>'0',
            'updated_at'=>Carbon::now()
            ]);

            return redirect()->back()->with('success',' Package succesfuly purchase. ');
    }else{
       return redirect()->back()->with('delete','Something went wrong. Please try again.');
    }



    }
}
