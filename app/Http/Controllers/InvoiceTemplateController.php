<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceTemplateRequest;
use App\Models\InvoiceTemplate;
use Illuminate\Http\Request;

class InvoiceTemplateController extends Controller
{
    public function create()
    {
        $data =[
            'invoiceTemplates' => InvoiceTemplate::get(),
        ];
        return view('admin.template.create',$data);
    }


    public function store(StoreInvoiceTemplateRequest $request)
    {
        $validatedData = $request->validated();
        $organizationPackage = InvoiceTemplate::create($validatedData);
        return redirect()->back()->with('message', 'Successfully create Invoice');
    }
}
