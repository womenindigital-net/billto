<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SendMail_info;
use Illuminate\Support\Facades\Auth;

class SettignsController extends Controller
{
    public function Settign()
    {
        return view('frontend.settings');
    }
    public function DefaultSetting()
    {
        return view('frontend.default-setting');
    }
    public function Myallinvoice()
    {
        $invoicessData = Invoice::where('user_id', Auth::user()->id)->get(['id', 'invoice_to', 'invoice_id', 'invoice_date', 'total','invoice_status','template_name']);
        $count = $invoicessData->count();
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->get();
        $trash = Invoice::where('user_id',$user_id)->where('invoice_status','incomlete')->count();
        $all_Invoice_Count = Invoice::where('user_id',$user_id)->count();
        $sendByMail_count = SendMail_info::where('user_id', $user_id)->count();
        $Total_Amount_conut = Invoice::where('user_id',$user_id )->where('invoice_status','complete')->sum('total');
        return view('frontend.dashboard.home')->with(compact('invoicessData', 'count','user' ,'all_Invoice_Count','trash','sendByMail_count','Total_Amount_conut'));
    }

    public function MyTrashinvoice()
    {
        $invoicessData = Invoice::where('user_id', Auth::user()->id)->where('invoice_status','incomlete')->get(['id', 'invoice_to', 'invoice_id', 'invoice_date', 'total','invoice_status','template_name']);
        $count = $invoicessData->count();
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->get();
        $trash = Invoice::where('user_id',$user_id)->where('invoice_status','incomlete')->count();
        $all_Invoice_Count = Invoice::where('user_id',$user_id)->count();
        $sendByMail_count = SendMail_info::where('user_id', $user_id)->count();
        $Total_Amount_conut = Invoice::where('user_id',$user_id )->where('invoice_status','complete')->sum('total');
        return view('frontend.dashboard.home')->with(compact('invoicessData', 'count','user' ,'all_Invoice_Count','trash','sendByMail_count','Total_Amount_conut'));

    }
}
