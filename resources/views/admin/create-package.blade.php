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
                                <h4 class="card-title">Create package</h4>
                                <hr>
                                <form action="{{ url('admin/package/create') }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Package name</label>
                                                <input type="text" name="packageName" class="form-control" id="validationCustom01"
                                                     required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Package Duration</label>
                                                <input type="text" name="packageDuration" class="form-control" id="validationCustom02"
                                                      required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Package Price</label>
                                                <input type="number" name="price"  class="form-control" id="validationCustom02"
                                                      required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Tamplate Quantity</label>
                                                <input type="number" name="templateQuantity" class="form-control" id="validationCustom02"
                                                      required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Limit invoice generate</label>
                                                <input type="number" name="limitInvoiceGenerate" class="form-control" id="validationCustom02"
                                                      required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <h3 class="mb-3">Choose tamplate</h3>
                                        <div class="col-2">
                                            <label class="form-label">Tamplate One</label> <br>
                                            <input type="checkbox" style="height: 20px; width:20px">
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Tamplate two</label> <br>
                                            <input type="checkbox" style="height: 20px; width:20px">
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Tamplate three</label> <br>
                                            <input type="checkbox" style="height: 20px; width:20px">
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Tamplate Four</label> <br>
                                            <input type="checkbox" style="height: 20px; width:20px">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div>
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
