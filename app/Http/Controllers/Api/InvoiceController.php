<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\ComplateInvoiceCount;
use App\Models\Invoice;
use App\Models\InvoiceTemplate;
use App\Models\SendMail_info;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mpdf\Config\FontVariables;
use Mpdf\Config\ConfigVariables as ConfigConfigVariables;

class InvoiceController extends BaseController
{

    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $data  = Invoice::where('id', 1)->get()->first();

        $template_id = "";
        $template_id_check = InvoiceTemplate::get()->first();

        $lastInvoice = Invoice::where('user_id', $user_id)->orderBy('created_at', 'desc')->get([
            'invoice_form',
            'invoice_to',
            'invoice_id',
            'id',
        ])->first();

        $text = "INVC-000";
        if ($lastInvoice != null) {
            $text = $lastInvoice->invoice_id;
        }
        $all = "";
        $lastnum = $text;
        $value = preg_match('/(\d+)\D*$/', $text, $m);
        if ($value == 1) {
            $lastnum = $m[1];
            $all = explode($lastnum, $text)[0];
            $lastnum = $lastnum + 1;
        }

        $invoiceCountNew = Invoice::where('user_id',   $user_id)->count();
        $invoiceCountNew += 1;
        $invoice_template = InvoiceTemplate::get();

        $user_logo_terms = User::where('id', $user_id)->get([
            'invoice_logo',
            'terms',
            'signature'
        ])->first();

        return $this->sendResponse([
            'all'               => $all,
            'lastnum'           => $lastnum,
            'lastInvoice'       => $lastInvoice,
            'user_logo_terms'   => $user_logo_terms,
            'invoiceCountNew'   => $invoiceCountNew,
            'template_id'       => $template_id,
            'invoice_template'  => $invoice_template,
            'template_id_check' => $template_id_check,
            'data'              => $data,

        ], 'Verified user ');
    }

    public function invoiceStore(Request $request)
    {

        $validation =  Validator::make($request->all(), [
            'currency' => 'required|max:30',
            'invoice_form' => 'required|max:90',
            'invoice_to' => 'required|max:90',
            'invoice_id' => 'required',
            'invoice_date' => 'required|date',
            'invoice_payment_term' => 'max:30',
            'invoice_po_number' => 'max:30',
            'invoice_notes' => 'max:100',
            'invoice_terms' => 'max:100',
            'invoice_logo' => 'max:1024',
        ]);

        if ($validation->fails()) {
            return $this->sendError('validation Error', $validation->errors());
        }

        $user_id = $request->user()->id;

        $template_id_check = $request->template_name;
        // Chack package limit
        $join_table_value = DB::table('users')
            ->join('payment_getways', 'users.id', '=', 'payment_getways.user_id')
            ->join('subscription_packages', 'payment_getways.subscription_package_id', '=', 'subscription_packages.id')
            ->join('subscription_package_templates', 'payment_getways.subscription_package_id', '=', 'subscription_package_templates.subscriptionPackageId')
            ->selectRaw('users.*, payment_getways.*, subscription_packages.*,subscription_package_templates.*, payment_getways.created_at as payment_created_at')
            ->where('users.id',  $user_id)->get();
        $data = "";
        foreach ($join_table_value as $join_table) {
            $truvalue = $join_table->template === $template_id_check;
            if ($truvalue == true) {
                $data = 1;
            }
        }

        $check = ComplateInvoiceCount::where('user_id', $user_id)->first();
        $invoice_last_id = $check->count_invoice_id;
        $invoice_last_id_plus = $invoice_last_id + 1;
        ComplateInvoiceCount::where('user_id', $user_id)->update([
            'count_invoice_id' => $invoice_last_id_plus,
        ]);

        $packageDuration = $join_table->packageDuration;
        $create_date = $join_table->payment_created_at;
        $date = new Carbon($create_date);
        $today_date = $date->diffInDays(Carbon::now());

        if ($join_table->limitInvoiceGenerate >= $check->current_invoice_total + 1 && $packageDuration >= $today_date && $data == 1) {

            if ($invoice_last_id != $invoice_last_id_plus) {
                ComplateInvoiceCount::where('user_id', $user_id)->where('count_invoice_id', $invoice_last_id_plus)->increment('invoice_count_total');
                ComplateInvoiceCount::where('user_id', $user_id)->where('count_invoice_id', $invoice_last_id_plus)->increment('current_invoice_total');
            }

            if ($invoice_last_id_plus != null) {
                // Tax Calculation Formula Start
                $taxPercentage = $request->invoice_tax;
                $products = Invoice::find($invoice_last_id_plus)->products->pluck('product_amount')->sum();
                $tax = ($taxPercentage * $products) / 100;
                $total = $tax + $products;
                // invocie Logo name Strat
                $id = $invoice_last_id_plus;
                $filename = null;
                $invoice_logo = $request->invoice_logo;

                if ($id == null && $invoice_logo != null) {
                    if ($request->file('invoice_logo')) {
                        $file = $request->file('invoice_logo');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $extension;
                        $file->move(public_path('storage/invoice/logo'), $filename);
                        User::where('id', $user_id)
                            ->update([
                                'invoice_logo' => $filename,
                            ]);
                    }
                } elseif ($id != null && $invoice_logo != null) {

                    $find = User::findOrFail($user_id);
                    $image_path         = public_path("storage/invoice/logo//") . $find->invoice_logo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                        // Create File
                        $file = $request->file('invoice_logo');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $extension;
                        $file->move(public_path('storage/invoice/logo'), $filename);
                        User::where('id', $user_id)
                            ->update([
                                'invoice_logo' => $filename,
                            ]);
                    }
                }
                if ($request->invoice_terms != null) {
                    User::where('id', $user_id)->update([
                        'terms' => $request->invoice_terms,
                    ]);
                }


                // invocie Logo name End
                $status = "";
                if ($request->receive_advance_amount === $request->final_total) {
                    $status = "paid";
                } else {
                    $status = "due";
                }
                // Update Invoice Data
                $data = array(
                    'invoice_logo' => 0,
                    'user_id' => $user_id,
                    'currency' => $request->currency,
                    'invoice_form' => $request->invoice_form,
                    'invoice_to' => $request->invoice_to,
                    'invoice_id' => $request->invoice_id,
                    'invoice_date' => $request->invoice_date,
                    'invoice_payment_term' => $request->invoice_payment_term,
                    'invoice_dou_date' => $request->invoice_dou_date,
                    'invoice_po_number' => $request->invoice_po_number,
                    'invoice_notes' => $request->invoice_notes,
                    'invoice_terms' => 0,
                    'invoice_tax_percent' => $request->invoice_tax,
                    'invoice_tax_amounts' => round($request->invoice_tax_amounts, 2),

                    'requesting_advance_amount_percent' => round($request->requesting_advance_amount, 2),
                    'total' => round(110, 2),
                    'final_total' => round($request->final_total, 2),
                    'receive_advance_amount' => round($request->receive_advance_amount, 2),
                    'balanceDue_amounts' => round($request->balanceDue_amounts, 2),
                    'discount_amounts' => round($request->discount_amounts, 2),
                    'discount_percent' => $request->discount_percent,

                    'invoice_status' => 'complete',
                    'status_due_paid' => $status,
                    'subtotal_no_vat' => round($request->subtotal_no_vat, 2),
                    'template_name' => $request->template_name,
                    'invoice_signature' => $request->invoice_signature,
                );
                $invoice =  Invoice::updateOrCreate(['id' => $id], $data);
                return $this->sendResponse("success", 'Invoice Successfuly Created.');
            }
            return response()->json(['message' => 'Please create product']);
        } else {
            return $this->sendError('error message', ['error' => 'Invoice limit over !']);
        }
    }

    public function send_invoice(Request $request)
    {
        $user_id = $request->user()->id;

        $template_id = $request->template_id;
        $data['invoiceData']  = Invoice::where('id', $template_id)->get([
            'invoice_logo',
            'invoice_form',
            'currency',
            'invoice_to',
            'invoice_id',
            'invoice_date',
            'invoice_payment_term',
            'invoice_dou_date',
            'invoice_po_number',
            'invoice_notes',
            'invoice_terms',
            'invoice_tax_percent',
            'invoice_tax_amounts',
            'requesting_advance_amount_percent',
            'receive_advance_amount',
            'discount_percent',
            'total',
            'template_name',
            'subtotal_no_vat',
            'final_total',
            'discount_amounts'
        ])->first();

        // $data['productsDatas'] = Invoice::find($template_id)->products->skip(0)->take(10);
        // $data['due'] = $data['invoiceData']->total;
        $data['email'] = "$request->emai_to";
        $data['subject'] = "$request->email_subject";
        $data['body'] = "$request->email_body";
        $data['template_id'] = "$template_id";
        $data['userInvoiceLogo']  = user::where('id',  $user_id)->get(['invoice_logo', 'terms', 'signature'])->first();

        $defaultConfig = (new ConfigConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $path = public_path() . "/fonts";
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'orientation' => 'p',
            'fontDir' => array_merge($fontDirs, [$path]),
            'fontdata' => $fontData + [
                'solaimanlipi' => [
                    'R' => 'SolaimanLipi_20-04-07.ttf',
                    'useOTL' => 0xFF,
                ],
            ],
            'default_font' => 'solaimanlipi',
        ]);
        $mpdf->WriteHTML(view('invoices.sendMail.mail_pdf')->with($data));
        $pdf =  $mpdf->Output('newdocument.pdf', 'S');
        Mail::send('invoices.sendMail.mail', $data,  function ($message) use ($data, $pdf) {
            $message->to($data['email'])->subject($data['subject'])->attachData($pdf, "Invoice.pdf");
        });

        SendMail_info::create([
            'user_id' =>  $user_id,
            'send_mail_to' => $data['email'],
            'mail_subject' => $data['subject'],
            'mail_body' => $data['body'],
            'invoice_tamplate_id' => $data['template_id'],
            'created_at' => Carbon::now()
        ]);


        return $this->sendResponse("Successfully send", 'Verified user ');
    }
}
