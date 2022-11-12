@extends('layouts.admin.admin')
@section('title', 'Home Page')

@push('admin_style_css')
@endpush
@section('page_content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Create-package </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!--************************************
            ********** Main content Start ***********
            ************************************-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="card p-2 mt-1">
                                    <h3>Edit organization package
                                        <a href="{{ url('admin/organization/package/list') }}"
                                            class="btn btn-primary btn-sm text-white  float-end ">Organization List
                                        </a>
                                    </h3>
                                </div>
                                <hr>
                                <form action="{{ url('admin/organization/package/' . $organizationPackage->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Organization Package Name</label>
                                                <input type="text" value="{{ $organizationPackage->organizationPackageName }}" name="organizationPackageName" class="form-control" id="validationCustom01"
                                                     required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Organization Package
                                                    Duration</label>
                                                <select class="form-select" name="organizationPackageDuration"
                                                    id="validationCustom03" required>
                                                    <option selected disabled value="">Select package</option>
                                                    <option value="30" {{ $organizationPackage->organizationPackageDuration == 30 ? 'selected' : '' }}>One Month</option>
                                                    <option value="90" {{ $organizationPackage->organizationPackageDuration == 90 ? 'selected' : '' }}>three Month</option>
                                                    <option value="180" {{ $organizationPackage->organizationPackageDuration == 180 ? 'selected' : '' }}>Six Month</option>
                                                    <option value="365" {{ $organizationPackage->organizationPackageDuration == 365 ? 'selected' : '' }}>One Month</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Organization Package Price</label>
                                                <input type="number" value="{{ $organizationPackage->price }}" name="price"  class="form-control" id="validationCustom02"
                                                      required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Organizatin Tamplate Quantity</label>
                                                <input type="number" value="{{ $organizationPackage->organizationPackageQuantity }}" name="organizationPackageQuantity" class="form-control" id="validationCustom02"
                                                      required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Limit Bill Generate</label>
                                                <input type="number" value="{{ $organizationPackage->limitBillGenerate }}" name="limitBillGenerate" class="form-control" id="validationCustom02"
                                                      required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Organization Employee Limitation</label>
                                                <input type="number" value="{{ $organizationPackage->organizationEmployeeLimitation }}" name="organizationEmployeeLimitation" class="form-control" id="validationCustom02"
                                                      required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <h3 class="mb-3">Choose tamplate</h3>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class=" d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_1" {{ $check1 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"  >Tamplate One</label>
                                                </div>
                                                <div class=" d-flex">
                                                    <input type="checkbox"  name="template[]" value="tamplate_2" {{ $check2 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Two</label>
                                                </div>
                                                <div class=" d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_3" {{ $check3 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Three</label>
                                                </div>

                                                <div class=" d-flex">
                                                    <input type="checkbox"  name="template[]" value="tamplate_4" {{ $check4 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Four</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_5" {{ $check5 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Five</label>
                                                </div>
                                                <div class=" d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_6" {{ $check6 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Six</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_7" {{ $check7 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Seve</label>
                                                </div>

                                                <div class=" d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_8" {{ $check8 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Eight</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_9" {{ $check9 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Nine</label>
                                                </div>
                                                <div class=" d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_10" {{ $check10 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Ten</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_11" {{ $check11 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate Eleven</label>
                                                </div>

                                                <div class=" d-flex">
                                                    <input type="checkbox" name="template[]" value="tamplate_12" {{ $check12 }}
                                                    style="height: 20px; width:20px">
                                                    <label class="form-label ms-2"   >Tamplate twelve</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="d-flex justify-content-start">
                                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->

                </div>


                <!--************************************
                 ********** Main content END ***********
                 ************************************-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <!-- end main content-->

    @endsection
    @push('admin_style_js')
    @endpush
