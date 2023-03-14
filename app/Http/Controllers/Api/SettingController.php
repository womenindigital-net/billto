<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Models\Invoice;
use App\Models\SendMail_info;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    public function Myallinvoice(Request $request)
    {
        $user_id = $request->user()->id;
        $invoicessData = Invoice::where('user_id', $user_id)->get(['id', 'invoice_to', 'invoice_id', 'invoice_date', 'total', 'invoice_status', 'template_name', 'currency']);

        $all_Invoice_Count = Invoice::where('user_id', $user_id)->whereIn('status_due_paid', ['paid', 'due'])->count();
        $sendByMail_count = SendMail_info::where('user_id', $user_id)->count();
        $Total_Amount_conut = Invoice::where('user_id', $user_id)->where('invoice_status', 'complete')->sum('final_total');
        $paid_Total_Amount_conut = Invoice::where('user_id', $user_id)->where('invoice_status', 'complete')->sum('receive_advance_amount');
        $due_Total_Amount_conut = Invoice::where('user_id', $user_id)->where('invoice_status', 'complete')->sum('balanceDue_amounts');
        $allInvoiceDatas = Invoice::where('user_id', $user_id)->whereIn('status_due_paid', ['due', 'paid'])->orderBy('id', 'DESC')->paginate(10);

        $latestDataInvoices = Invoice::where('user_id', $user_id)->orderBy('id', 'DESC')->limit(7)->get();


        return $this->sendResponse([
            'invoices_Data' => $invoicessData,
            'all_Invoice_Count' => $all_Invoice_Count,
            'sendByMail_count' => $sendByMail_count,
            'Total_Amount_conut' => $Total_Amount_conut,
            'paid_Total_Amount_conut' => $paid_Total_Amount_conut,
            'due_Total_Amount_conut' => $due_Total_Amount_conut,
            'all_Invoice_Details' => $allInvoiceDatas,
            'latest_Data_Invoices' => $latestDataInvoices,
        ], 'Verified user ');
    }

    public function MyTrashinvoice(Request $request)
    {
        $user_id = $request->user()->id;

        $invoices_trast_Data = Invoice::where('user_id', $user_id)->where('status_due_paid', 'draft')->get(['id', 'invoice_to', 'invoice_id', 'invoice_date', 'total', 'invoice_status', 'template_name', 'currency', 'currency']);
        return $this->sendResponse([
            'invoices_trast_Data' => $invoices_trast_Data,
        ], 'Verified user ');
    }
}
