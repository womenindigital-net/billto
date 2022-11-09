<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPackage;
use App\Http\Controllers\Controller;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.create-package');
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
    public function edit(SubscriptionPackage $subscriptionPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriptionPackageRequest  $request
     * @param  \App\Models\SubscriptionPackage  $subscriptionPackage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionPackageRequest $request, SubscriptionPackage $subscriptionPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionPackage  $subscriptionPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionPackage $subscriptionPackage)
    {
        //
    }
}
