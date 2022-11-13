<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class SubscriptionPackContoller extends Controller
{
    public function payment_gateway($id)
    {
       $subscribe_package = SubscriptionPackage::where('id',$id)->get();

        return view('payment_gatewaye.index', compact('subscribe_package'));
    }
}
