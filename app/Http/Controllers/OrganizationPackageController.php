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
        return view('admin.organization-package.list-organization-package',$data);
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
        $organizationPackage = OrganizationPackage::create($validatedData );
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
    public function edit(OrganizationPackage $organizationPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizationPackageRequest  $request
     * @param  \App\Models\OrganizationPackage  $organizationPackage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganizationPackageRequest $request, OrganizationPackage $organizationPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationPackage  $organizationPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationPackage $organizationPackage)
    {
        //
    }
}
