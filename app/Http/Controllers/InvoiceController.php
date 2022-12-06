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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data  = Invoice::where('id',1)->get()->first();

        $user = Auth::user()->id;
        Invoice::where('user_id', $user)->where('invoice_status', 'incomlete')->delete();

        $template_id = "";
        $template_id_check = InvoiceTemplate::get()->first();

        $lastInvoice = Invoice::where('user_id', $user)
            ->orderBy('created_at', 'desc')
            ->get([
                'invoice_form',
                'invoice_to',
                'id',
            ])
            ->first();
        $invoiceCountNew = Invoice::where('user_id', Auth::user()->id)->count();
        $invoiceCountNew += 1;
        $invoice_template = InvoiceTemplate::get();

        return view('frontend.create-invoice')->with(compact('lastInvoice', 'invoiceCountNew', 'template_id', 'invoice_template', 'template_id_check','data'));
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
        // dd( $join_table_template);


        Invoice::where('user_id', $user)->where('invoice_status', 'incomlete')->delete();
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

        return view('frontend.create-invoice')->with(compact('lastInvoice', 'invoiceCountNew', 'template_id', 'invoice_template'));
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
            'invoice_dou_date' => 'date|after:invoice_date',
            'invoice_po_number' => 'max:30',
            'invoice_notes' => 'max:1024',
            'invoice_terms' => 'max:1024',
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

        $data="";
        foreach ($join_table_value as $join_table) {
             $truvalue = $join_table->template === $template_id_check;
             if($truvalue==true){
                 $data = 1;
             }
        }

        $check = ComplateInvoiceCount::where('user_id', $user_id)->first();

        $packageDuration = $join_table->packageDuration;
        $create_date = $join_table->payment_created_at;
        $date = new Carbon($create_date);
        $today_date = $date->diffInDays(Carbon::now());

        if ($join_table->limitInvoiceGenerate >= $check->current_invoice_total + 1 && $packageDuration >= $today_date && $data==1) {

            if ($check) {
                ComplateInvoiceCount::where('user_id', $user_id)->increment('invoice_count_total');
                ComplateInvoiceCount::where('user_id', $user_id)->increment('current_invoice_total');
            } else {
                ComplateInvoiceCount::insert([
                    'user_id' =>  $user_id,
                    'invoice_count_total' => 1,
                    'current_invoice_total' => 1,
                    'created_at' => Carbon::now()
                ]);
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
                    }
                } elseif ($id != null && $invoice_logo != null) {

                    $find = Invoice::findOrFail($id);
                    $image_path         = public_path("storage/invoice/logo//") . $find->invoice_logo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                        // Create File
                        $file = $request->file('invoice_logo');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $extension;
                        $file->move(public_path('storage/invoice/logo'), $filename);
                    }
                }
                // invocie Logo name End

                // Update Invoice Data
                $data = array(
                    'invoice_logo' => $filename,
                    'currency' => $request->currency,
                    'invoice_form' => $request->invoice_form,
                    'invoice_to' => $request->invoice_to,
                    'invoice_id' => $request->invoice_id,
                    'invoice_date' => $request->invoice_date,
                    'invoice_payment_term' => $request->invoice_payment_term,
                    'invoice_dou_date' => $request->invoice_dou_date,
                    'invoice_po_number' => $request->invoice_po_number,
                    'invoice_notes' => $request->invoice_notes,
                    'invoice_terms' => $request->invoice_terms,
                    'invoice_tax_percent' => $request->invoice_tax,
                    'requesting_advance_amount_percent' => $request->requesting_advance_amount,
                    'total' => $total,
                    'invoice_status' => 'complete',
                    'template_name' => $request->template_name,
                );
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
            'requesting_advance_amount_percent',
            // 'invoice_amu_paid_percent',
            // 'invoice_amu_paid',
            'total',
            'template_name',
        ])->first();
        $productsDatas = Invoice::find($id)->products->skip(0)->take(6);
        $due = $invoiceData->total;
        if (Auth::user()->plan == 'free') {
            $pdf = Pdf::loadView('invoices.free.all_invoice', compact('invoiceData', 'productsDatas', 'due'));
            return $pdf->stream('invoices.free.all_invoice.pdf');
        } elseif (Auth::user()->plan == 'premium') {
            $pdf = Pdf::loadView('invoices.wid')->with(compact('invoiceData', 'productsDatas', 'due'));
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
            'requesting_advance_amount_percent',

            'total',
            'template_name',
        ])->first();

        $data['productsDatas'] = Invoice::find($template_id)->products->skip(0)->take(6);
        $data['due'] = $data['invoiceData']->total;
        $data['email'] = "$request->emai_to";
        $data['subject'] = "$request->email_subject";
        $data['body'] = "$request->email_body";

        $data['template_id'] = "$template_id";
        $pdf = Pdf::loadView('invoices.sendMail.mail_pdf', $data);

        Mail::send('invoices.sendMail.mail', $data,  function ($message) use ($data, $pdf) {
            $message->to($data['email'])->subject($data['subject'])->attachData($pdf->output(), "Invoice.pdf");
        });
        return response()->json(['message' => '1']);
        // return response()->json($template_id = $request->template_id);
        // return redirect()->back()->with('success', "Mail Successfully Send");
    }

    public function previewImage($id)
    {
        $data  = Invoice::where('id', $id)->get();

        return view('invoices.premium.test',compact('data'))->render();

    }
}
