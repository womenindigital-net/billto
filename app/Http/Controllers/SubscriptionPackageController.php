<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\InvoiceTemplate;
use App\Models\SubscriptionPackage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use App\Models\SubscriptionPackageTemplate;
use CreateSubscriptionPackageTemplatesTable;
use App\Http\Requests\StoreSubscriptionPackageRequest;
use App\Http\Requests\UpdateSubscriptionPackageRequest;

class SubscriptionPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'packages' => SubscriptionPackage::get(),
        ];
        return view('admin.package.list-package', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'invoiceTemplates' => InvoiceTemplate::get(),
        ];
        return view('admin.package.create-package', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriptionPackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionPackageRequest $request)
    {
        //    $validatedData = $request->validated();
        // SubscriptionPackage::create($validatedData);
        $SubscriptionPackage = new SubscriptionPackage();
        $SubscriptionPackage->packageName = $request->packageName;
        $SubscriptionPackage->packageDuration = $request->packageDuration;
        $SubscriptionPackage->price = $request->price;
        $SubscriptionPackage->templateQuantity = $request->templateQuantity;
        $SubscriptionPackage->limitInvoiceGenerate = $request->limitInvoiceGenerate;
        $SubscriptionPackage->save();

        $get_id = $SubscriptionPackage->id;
        $tamp_names = $request->template;

        foreach ($tamp_names as  $tamp_name) {
            SubscriptionPackageTemplate::create([
                'subscriptionPackageId' => $get_id,
                'template' => $tamp_name,
            ]);
        }
        $logos = $request->file('logo');
        $description = $request->description;

        foreach ($logos as $key => $logo) {
            $file = $logo;
            $ext = $file->getClientOriginalExtension();
            $filename = rand(00000, 99999) . time() .  '.' . $ext;
            $file->move('uploads/PricingLogo/', $filename);
            Pricing::create([
                'subscription_package_id' => $get_id,
                'logo' => $filename,
                'description' => $description[$key],

            ]);
        }
        return redirect()->back()->with('message', 'Successfully create Package.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscriptionPackage  $subscriptionPackage
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionPackage $subscriptionPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubscriptionPackage  $subscriptionPackage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscriptionPackage = SubscriptionPackage::findOrFail($id);
        $templats = SubscriptionPackageTemplate::where('subscriptionPackageId', $id)->get();
        $invoiceTemplates = InvoiceTemplate::get();
        $pricings = Pricing::where('subscription_package_id', $id)->get();
        return view('admin.package.edit-package', compact('subscriptionPackage', 'templats', 'invoiceTemplates', 'pricings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriptionPackageRequest  $request
     * @param  \App\Models\SubscriptionPackage  $subscriptionPackage
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubscriptionPackageRequest $request, $id)
    {
        $get_id = $id;
        $subscriptionPackage = SubscriptionPackage::find($get_id);
        $subscriptionPackage->packageName = $request->packageName;
        $subscriptionPackage->packageDuration = $request->packageDuration;
        $subscriptionPackage->price = $request->price;
        $subscriptionPackage->templateQuantity = $request->templateQuantity;
        $subscriptionPackage->limitInvoiceGenerate = $request->limitInvoiceGenerate;
        $subscriptionPackage->save();

        $tamp_names = $request->template;
        SubscriptionPackageTemplate::where('subscriptionPackageId', $get_id)->delete();
        foreach ($tamp_names as  $tamp_name) {
            SubscriptionPackageTemplate::create([
                'subscriptionPackageId' => $get_id,
                'template' => $tamp_name,
            ]);
        }

        // $logos = $request->file('logo');
        // $description = $request->description;

        // foreach ($logos as $key => $logo) {
        //     $file = $logo;
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = rand(00000, 99999) . time() .  '.' . $ext;
        //     $file->move('uploads/PricingLogo/', $filename);
        //     Pricing::create([
        //         'subscription_package_id' => $get_id,
        //         'logo' => $filename,
        //         'description' => $description[$key],

        //     ]);
        // }

        return redirect()->back()->with('message', 'Successfully Update Package.');
    }

    public function packageUpdate(Request $request)
    {
        // dd($request->description, $request->logo, $request->id);
        $description = $request->description;
        $oldLogo = $request->logo_old;
        $id = $request->id;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = rand(00000, 99999) . time() .  '.' . $ext;
            $file->move('uploads/PricingLogo/', $filename);

            Pricing::where('id', $id )->update([
                'logo' =>  $filename,
                'description' =>  $description,
            ]);
        }
        else{
            Pricing::where('id', $id )->update([
                'description' =>  $description,
            ]);
        }
        return redirect()->back()->with('message', 'Successfully Update Package.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionPackage  $subscriptionPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriptionPackage = SubscriptionPackage::findOrFail($id);
        $subscriptionPackage->delete();
        SubscriptionPackageTemplate::where('subscriptionPackageId', $id)->delete();
        return redirect()->back()->with('message', 'Successfully Delete Package.');
    }
}
