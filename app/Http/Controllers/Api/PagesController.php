<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ComplateInvoiceCount;
use App\Models\InvoiceTemplate;
use App\Models\PaymentGetway;
use App\Models\SubscriptionPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function Apiindex()
    {
        // Only for google, facebook & Github check request start
        if (Auth::check()) {
            $get_id =  Auth::user()->id;
            $user_id_check = PaymentGetway::where('user_id', $get_id)->count();

            if ($user_id_check == 0) {
                PaymentGetway::create([
                    'user_id' => $get_id,
                    'amount' => '0',
                    'subscription_package_id' => '1',
                    'organization_package_id' => '0',
                    'created_at' => Carbon::now()
                ]);
                ComplateInvoiceCount::create([
                    'user_id' => $get_id,
                    'invoice_count_total' => '0',
                    'current_invoice_total' => '0',
                    'created_at' => Carbon::now()
                ]);
            }
        }
        // Only for google, facebook & Github check request END

        $subcription_package_free = SubscriptionPackage::Where('packageName', 'FREE')->orWhere('packageName', 'Free')->get();
        $subcription_package_stand = SubscriptionPackage::Where('packageName', 'Standard')->orWhere('packageName', 'STANDARD')->get();
        $subcription_package_premium = SubscriptionPackage::Where('packageName', 'Premium')->orWhere('packageName', 'PREMIUM')->get();
        $invoice_template = InvoiceTemplate::get();
        return response()->json(
            [
                'subcription_package_free' => $subcription_package_free,
                'subcription_package_stand' => $subcription_package_stand,
                'subcription_package_premium' => $subcription_package_premium,
                'invoice_template' => $invoice_template
            ],
            200
        );
    }


}
