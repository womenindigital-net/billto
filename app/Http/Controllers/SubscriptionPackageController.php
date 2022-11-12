<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\SubscriptionPackage;
use App\Http\Controllers\Controller;
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
        return view('admin.package.create-package');
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
        // dd($subScriptionPackageTemplate);
        $check1 = "";
        $check2 = "";
        $check3 = "";
        $check4 = "";
        $check5 = "";
        $check6 = "";
        $check7 = "";
        $check8 = "";
        $check9 = "";
        $check10 = "";
        $check11 = "";
        $check12 = "";

        foreach ($templats as $tmp) {

            if ($tmp->template == "tamplate_1") {
                $check1 = "checked";
            } else if ($tmp->template == "tamplate_2") {
                $check2 = "checked";
            } else if ($tmp->template == "tamplate_3") {
                $check3 = "checked";
            } else if ($tmp->template == "tamplate_4") {
                $check4 = "checked";
            } else if ($tmp->template == "tamplate_5") {
                $check5 = "checked";
            } else if ($tmp->template == "tamplate_6") {
                $check6 = "checked";
            } else if ($tmp->template == "tamplate_7") {
                $check7 = "checked";
            } else if ($tmp->template == "tamplate_8") {
                $check8 = "checked";
            } else if ($tmp->template == "tamplate_9") {
                $check9 = "checked";
            } else if ($tmp->template == "tamplate_10") {
                $check10 = "checked";
            } else if ($tmp->template == "tamplate_11") {
                $check11 = "checked";
            } else if ($tmp->template == "tamplate_12") {
                $check12 = "checked";
            }
        }
        return view('admin.package.edit-package', compact('subscriptionPackage', 'check1', 'check2', 'check3', 'check4', 'check5', 'check6', 'check7', 'check8', 'check9', 'check10', 'check11', 'check12'));
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
