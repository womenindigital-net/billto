<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\PaymentGetway;
use App\Models\InvoiceTemplate;
use App\Models\SubscriptionPackage;
use App\Http\Controllers\Controller;
use App\Models\ComplateInvoiceCount;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        // Only for google, facebook & Github check request start
        if(Auth::check()){
            $get_id =  Auth::user()->id;
           $user_id_check = PaymentGetway::where('user_id',$get_id)->count();

           if($user_id_check==0){
            PaymentGetway::create([
                'user_id'=> $get_id,
                'amount'=>'0',
                'subscription_package_id'=>'1',
                'organization_package_id'=>'0',
                'created_at'=>Carbon::now()
            ]);
            ComplateInvoiceCount::create([
                'user_id'=> $get_id,
                'invoice_count_total'=>'0',
                'current_invoice_total'=>'0',
                'created_at'=>Carbon::now()
            ]);
           }
        }
 // Only for google, facebook & Github check request END

     $subcription_package_free = SubscriptionPackage::Where('packageName','FREE')->orWhere('packageName','Free')->get();
     $subcription_package_stand= SubscriptionPackage::Where('packageName','Standard')->orWhere('packageName','STANDARD')->get();
     $subcription_package_premium = SubscriptionPackage::Where('packageName','Premium')->orWhere('packageName','PREMIUM')->get();

     $invoice_template = InvoiceTemplate::get();

        return view('frontend.home',compact('subcription_package_free','subcription_package_premium','subcription_package_stand','invoice_template',));
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }

    public function create()
    {
        return view('frontend.create_invoice');
    }

    public function createbill(Request $request)
    {
        return $request;
        return view('frontend.create_invoice');
    }




}
