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
                                    <h3>Edit package
                                        <a href="{{ url('admin/package/list') }}"
                                            class="btn btn-danger btn-sm text-white  float-end ">Back
                                        </a>
                                    </h3>
                                </div>
                                <hr>
                                <form action="{{ url('admin/package/' . $subscriptionPackage->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Package name</label>
                                                <input type="text" value="{{ $subscriptionPackage->packageName }}"
                                                    name="packageName" class="form-control" id="validationCustom01"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Package Duration</label>
                                            <select class="form-select" name="packageDuration"
                                                id="validationCustom02" required>
                                                <option selected disabled value="">Select package</option>
                                                <option value="30"{{ $subscriptionPackage->packageDuration== 30 ? 'selected' : '' }}>One Month</option>
                                                <option value="90" {{ $subscriptionPackage->packageDuration== 90 ? 'selected' : '' }}>three Month</option>
                                                <option value="180" {{ $subscriptionPackage->packageDuration== 180 ? 'selected' : '' }}>Six Month</option>
                                                <option value="365" {{ $subscriptionPackage->packageDuration== 365 ? 'selected' : '' }}>One Year</option>
                                            </select>

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Package Price</label>
                                                <input type="number" value="{{ $subscriptionPackage->price }}"
                                                    name="price" class="form-control" id="validationCustom02" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Tamplate Quantity</label>
                                                <input type="number" value="{{ $subscriptionPackage->templateQuantity }}"
                                                    name="templateQuantity" class="form-control" id="validationCustom02"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Limit invoice
                                                    generate</label>
                                                <input type="number"
                                                    value="{{ $subscriptionPackage->limitInvoiceGenerate }}"
                                                    name="limitInvoiceGenerate" class="form-control" id="validationCustom02"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <h3 class="mb-3">Choose tamplate</h3>
                                        <div class="row">
                                            @foreach ($invoiceTemplates as $invoiceTemplate)
                                                <div class="col-md-4 mb-2">
                                                    <div class=" d-flex">
                                                        <input type="checkbox" name="template[]"
                                                            value="{{ $taplate_id = $invoiceTemplate->id }}"
                                                            @foreach ($templats as $template)
                                                            @if ($taplate_id == $template->template) checked @else @endif @endforeach
                                                            style="height: 20px; width:20px">
                                                        <label
                                                            class="form-label ms-2">{{ $invoiceTemplate->templateName }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="d-flex justify-content-start">
                                            <button class="btn btn-primary mt-3" type="submit">Update</button>
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
