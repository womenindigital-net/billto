<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;
use Carbon\Cli\Invoker;
use Illuminate\Http\Request;
use App\Mail\InvoiceSendMail;
use Illuminate\Support\Carbon;
use App\Models\InvoiceTemplate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\ComplateInvoiceCount;
use App\Models\SendMail_info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;




class InvoiceController extends Controller
{
    public function __construct()
    {
        session_start();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // If the user has login Start
        if (Auth::check()) {
            $data  = Invoice::where('id', 1)->get()->first();
            $user = Auth::user()->id;
            $template_id = "";
            $template_id_check = InvoiceTemplate::get()->first();

            $lastInvoice = Invoice::where('user_id', $user)->orderBy('created_at', 'desc')->get([
                    'invoice_form',
                    'invoice_to',
                    'invoice_id',
                    'id',
                ])->first();

                $text="INVC-000";
                if($lastInvoice!=null){
                    $text = $lastInvoice->invoice_id;
                }
                $all ="";
                $lastnum = $text;
                $value = preg_match('/(\d+)\D*$/', $text, $m);
                if($value==1){
                    $lastnum= $m[1];
                    $all = explode($lastnum, $text)[0];
                    $lastnum = $lastnum+1;
                }

            $invoiceCountNew = Invoice::where('user_id', Auth::user()->id)->count();
            $invoiceCountNew += 1;
            $invoice_template = InvoiceTemplate::get();

            $user_logo_terms = User::where('id', Auth::user()->id)->get([
                'invoice_logo',
                'terms',
                'signature'
            ])->first();

            $session = Session::get('session_invoice_id');
            if ($session != "") {
                return redirect()->to('/edit/invoices/' . $session);
            } else {
                return view('frontend.create-invoice')->with(compact('all','lastnum','lastInvoice', 'user_logo_terms', 'invoiceCountNew', 'template_id', 'invoice_template', 'template_id_check', 'data'));
            }
        } else {

            // If the user is not logined in Start.
            $sessionId = session_id();
            $data  = Invoice::where('id', 1)->get()->first();
            $template_id = "";
            $template_id_check = InvoiceTemplate::get()->first();

            $lastInvoice = Invoice::where('session_id',  $sessionId)
                ->orderBy('created_at', 'desc')
                ->get([
                    'invoice_form',
                    'invoice_to',
                    'id',
                ])
                ->first();
            $invoiceCountNew = Invoice::where('session_id',  $sessionId)->count();
            $invoiceCountNew += 1;
            $invoice_template = InvoiceTemplate::get();

            $user_logo_terms = User::where('id', 1 && 'is_admin', 1)->get([
                'invoice_logo',
                'terms',
                'signature'

            ])->first();

            return view('frontend.create-invoice')->with(compact('user_logo_terms', 'lastInvoice', 'invoiceCountNew', 'template_id', 'invoice_template', 'template_id_check', 'data'));
        }
    }

    public function index_home($id)
    {
        $template_id = $id;
        $user = Auth::user()->id;

        $join_table_template = DB::table('users')
            ->join('payment_getways', 'users.id', '=', 'payment_getways.user_id')
            ->join('subscription_packages', 'payment_getways.subscription_package_id', '=', 'subscription_packages.id')
            ->join('subscription_package_templates', 'payment_getways.subscription_package_id', '=', 'subscription_package_templates.subscriptionPackageId')
            ->where('users.id',  $user)->get();

        // Invoice::where('user_id', $user)->where('invoice_status', 'incomlete')->delete();

        $lastInvoice = Invoice::where('user_id', $user)
            ->orderBy('created_at', 'desc')
            ->get([
                'invoice_form',
                'invoice_to',
                'id',
            ])
            ->first();

        $invoice_template = InvoiceTemplate::get();
        $invoiceCountNew = Invoice::where('user_id', Auth::user()->id)->count();
        $invoiceCountNew += 1;

        $user_logo_terms = User::where('id', Auth::user()->id)->get([
            'invoice_logo',
            'terms',
            'signature'
        ])->first();


        return view('frontend.create-invoice')->with(compact('lastInvoice', 'user_logo_terms', 'invoiceCountNew', 'template_id', 'invoice_template'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
        dd($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'currency' => 'required|max:30',
            'invoice_form' => 'required|max:1024',
            'invoice_to' => 'required|max:1024',
            'invoice_id' => 'required',
            'invoice_date' => 'required|date',
            'invoice_payment_term' => 'max:30',
            'invoice_po_number' => 'max:30',
            'invoice_notes' => 'max:1024',
            'invoice_terms' => 'max:1024',
            'invoice_logo' => 'max:1024',
        ]);

        $user_id = Auth::user()->id;

        $template_id_check = $request->template_name;
        // Chack package limit
        $join_table_value = DB::table('users')
            ->join('payment_getways', 'users.id', '=', 'payment_getways.user_id')
            ->join('subscription_packages', 'payment_getways.subscription_package_id', '=', 'subscription_packages.id')
            ->join('subscription_package_templates', 'payment_getways.subscription_package_id', '=', 'subscription_package_templates.subscriptionPackageId')
            ->selectRaw('users.*, payment_getways.*, subscription_packages.*,subscription_package_templates.*, payment_getways.created_at as payment_created_at')
            ->where('users.id',  $user_id)->get();

        // dd($join_table_value);

        $data = "";
        foreach ($join_table_value as $join_table) {
            $truvalue = $join_table->template === $template_id_check;
            if ($truvalue == true) {
                $data = 1;
            }
        }

        $check = ComplateInvoiceCount::where('user_id', $user_id)->first();
        $invoice_last_id = $check->count_invoice_id;

        ComplateInvoiceCount::where('user_id', $user_id)->update([
            'count_invoice_id' => $request->id
        ]);
        $packageDuration = $join_table->packageDuration;
        $create_date = $join_table->payment_created_at;
        $date = new Carbon($create_date);
        $today_date = $date->diffInDays(Carbon::now());

        if ($join_table->limitInvoiceGenerate >= $check->current_invoice_total + 1 && $packageDuration >= $today_date && $data == 1) {

            if ($invoice_last_id != $request->id) {
                ComplateInvoiceCount::where('user_id', $user_id)->where('count_invoice_id', $request->id)->increment('invoice_count_total');
                ComplateInvoiceCount::where('user_id', $user_id)->where('count_invoice_id', $request->id)->increment('current_invoice_total');
            }



            if ($request->id != null) {
                // Tax Calculation Formula Start
                $taxPercentage = $request->invoice_tax;
                $products = Invoice::find($request->id)->products->pluck('product_amount')->sum();
                $tax = ($taxPercentage * $products) / 100;
                $total = $tax + $products;


                // invocie Logo name Strat
                $id = $request->id;
                $filename = null;
                $invoice_logo = $request->invoice_logo;

                if ($id == null && $invoice_logo != null) {
                    if ($request->file('invoice_logo')) {
                        $file = $request->file('invoice_logo');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $extension;
                        $file->move(public_path('storage/invoice/logo'), $filename);
                        User::where('id', Auth::user()->id)
                            ->update([
                                'invoice_logo' => $filename,
                            ]);
                    }
                } elseif ($id != null && $invoice_logo != null) {

                    $find = User::findOrFail(Auth::user()->id);
                    $image_path         = public_path("storage/invoice/logo//") . $find->invoice_logo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                        // Create File
                        $file = $request->file('invoice_logo');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $extension;
                        $file->move(public_path('storage/invoice/logo'), $filename);
                        User::where('id', Auth::user()->id)
                            ->update([
                                'invoice_logo' => $filename,
                            ]);
                    }
                }


                if ($request->invoice_terms != null) {

                    User::where('id', Auth::user()->id)
                        ->update([
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
                    'total' => round($total, 2),
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

                Session::forget('session_invoice_id');
                $invoice =  Invoice::updateOrCreate(['id' => $id], $data);
                return response()->json([$invoice->id]);
            }
            return response()->json(['message' => 'Please create product']);
        } else {
            return response()->json(['message' => '123']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    /**
     * Downlode the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    // public function download($id)
    // {
    //     $invoiceData = Invoice::where('id', $id)->get([
    //         'invoice_logo',
    //         'invoice_form',
    //         'currency',
    //         'invoice_to',
    //         'invoice_id',
    //         'invoice_date',
    //         'invoice_payment_term',
    //         'invoice_dou_date',
    //         'invoice_po_number',
    //         'invoice_notes',
    //         'invoice_terms',
    //         'invoice_tax_percent',
    //         'requesting_advance_amount_percent',
    //         // 'invoice_amu_paid_percent',
    //         // 'invoice_amu_paid',
    //         'total',
    //     ])->first();
    //     $productsDatas = Invoice::find($id)->products->skip(0)->take(6);
    //     $due = $invoiceData->total;
    //     //  - $invoiceData->invoice_amu_paid;
    //     // dd(Auth::user()->plan);
    //     if (Auth::user()->plan == 'free') {
    //         return view('invoices.free.invoice_1')->with(compact('invoiceData', 'productsDatas', 'due'));
    //     } elseif (Auth::user()->plan == 'premium') {
    //         return view('invoices.wid')->with(compact('invoiceData', 'productsDatas', 'due'));
    //     }
    // }


    public function invoice_download($id)
    {

        $invoiceData = Invoice::where('id', $id)->get([
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

        $userInvoiceLogo  = user::where('id', Auth::user()->id)->get(['invoice_logo','terms','signature'])->first();

        $productsDatas = Invoice::find($id)->products->skip(0)->take(10);
        $due = $invoiceData->total;
        Session::forget('last_invoice_id_download');
        if (Auth::user()->plan == 'free') {
            $pdf = Pdf::loadView('invoices.free.all_invoice', compact('invoiceData', 'productsDatas','userInvoiceLogo', 'due'));
            return $pdf->stream('invoices.free.all_invoice.pdf');
        } elseif (Auth::user()->plan == 'premium') {
            $pdf = Pdf::loadView('invoices.wid')->with(compact('invoiceData', 'productsDatas', 'userInvoiceLogo','due'));
            return $pdf->stream('invoices.wid.pdf');
        }
    }

    public function send_invoice(Request $request)
    {

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

        $data['productsDatas'] = Invoice::find($template_id)->products->skip(0)->take(10);
        $data['due'] = $data['invoiceData']->total;
        $data['email'] = "$request->emai_to";
        $data['subject'] = "$request->email_subject";
        $data['body'] = "$request->email_body";
        $data['template_id'] = "$template_id";

        $data['userInvoiceLogo']  = user::where('id', Auth::user()->id)->get(['invoice_logo','terms','signature'])->first();

        $pdf = Pdf::loadView('invoices.sendMail.mail_pdf', $data);
        Mail::send('invoices.sendMail.mail', $data,  function ($message) use ($data, $pdf) {
            $message->to($data['email'])->subject($data['subject'])->attachData($pdf->output(), "Invoice.pdf");
        });
        SendMail_info::create([
            'user_id' => Auth::user()->id,
            'send_mail_to' => $data['email'],
            'mail_subject' => $data['subject'],
            'mail_body' => $data['body'],
            'invoice_tamplate_id' => $data['template_id'],
            'created_at' => Carbon::now()
        ]);

        Session::forget('last_invoice_id_send');
        return response()->json(['message' => '1']);
        // return response()->json($template_id = $request->template_id);
        //    return redirect()->back()->with('success', "Mail Successfully Send");
    }

    public function previewImage($id)
    {
        $data  = Invoice::find($id);
        $userLogoAndTerms = User::where('id', Auth::user()->id)->get([
            'invoice_logo',
            'terms','signature',

        ])->first();

        $productsDatas = Product::where('invoice_id', $id)->get();
        return view('invoices.preview_invoice.all_pre_invoice', compact('data', 'productsDatas', 'userLogoAndTerms'))->render();
    }


    public function complate_invoice($id)
    {
        Session::put('last_invoice_id_send', $id);
        Session::put('last_invoice_id_download', $id);
        Invoice::where('id',$id)->update(['invoice_status'=>"complete"]);
        return response()->json(['message' => $id]);
    }
}

