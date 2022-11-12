<?php

namespace App\Http\Controllers;

use App\Models\OrganizationPackage;
use App\Http\Controllers\Controller;
use App\Models\OrganizationPackageTemplate;
use App\Http\Requests\StoreOrganizationPackageRequest;
use App\Http\Requests\UpdateOrganizationPackageRequest;

class OrganizationPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'packages' => OrganizationPackage::get(),
        ];
        return view('admin.organization-package.list-organization-package', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organization-package.create-organization-package');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrganizationPackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizationPackageRequest $request)
    {
        $validatedData = $request->validated();
        $organizationPackage = OrganizationPackage::create($validatedData);
        $get_id = $organizationPackage->id;
        $tamp_names = $request->template;

        foreach ($tamp_names as  $tamp_name) {
            OrganizationPackageTemplate::create([
                'organizationPackageId' => $get_id,
                'template' => $tamp_name,
            ]);
        }
        return redirect()->back()->with('message', 'Successfully create organization Package.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationPackage  $organizationPackage
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationPackage $organizationPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationPackage  $organizationPackage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organizationPackage = OrganizationPackage::findOrFail($id);
        $templats = OrganizationPackageTemplate::where('organizationPackageId', $id)->get();
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

        return view('admin.organization-package.edit-organization-package', compact('organizationPackage', 'check1', 'check2', 'check3', 'check4', 'check5', 'check6', 'check7', 'check8', 'check9', 'check10', 'check11', 'check12'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizationPackageRequest  $request
     * @param  \App\Models\OrganizationPackage  $organizationPackage
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrganizationPackageRequest $request, $id)
    {
        $get_id = $id;
        $organizationPackage = OrganizationPackage::find($get_id);
        $organizationPackage->organizationPackageName = $request->organizationPackageName;
        $organizationPackage->organizationPackageDuration = $request->organizationPackageDuration;
        $organizationPackage->price = $request->price;
        $organizationPackage->organizationPackageQuantity = $request->organizationPackageQuantity;
        $organizationPackage->limitBillGenerate = $request->limitBillGenerate;
        $organizationPackage->organizationEmployeeLimitation = $request->organizationEmployeeLimitation;
        $organizationPackage->save();

        $tamp_names = $request->template;
        OrganizationPackageTemplate::where('organizationPackageId', $get_id)->delete();
        foreach ($tamp_names as  $tamp_name) {
            OrganizationPackageTemplate::create([
                'organizationPackageId' => $get_id,
                'template' => $tamp_name,
            ]);
        }
        return redirect()->back()->with('message', 'Successfully Update Organization Package.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationPackage  $organizationPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriptionPackage = OrganizationPackage::findOrFail($id);
        $subscriptionPackage->delete();
        OrganizationPackageTemplate::where('organizationPackageId', $id)->delete();
        return redirect()->back()->with('message', 'Successfully Delete Organization Package.');
    }
}
