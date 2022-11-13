<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
       $subcription_package = SubscriptionPackage::get();

        return view('frontend.home',compact('subcription_package'));
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
