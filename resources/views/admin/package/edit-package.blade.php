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
                                            class="btn btn-danger btn-sm text-white  float-end "> <i
                                                class="bx bx-left-arrow-alt"></i> Back
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
                                                <select class="form-select" name="packageDuration" id="validationCustom02"
                                                    required>
                                                    <option selected disabled value="">Select package</option>
                                                    <option
                                                        value="30"{{ $subscriptionPackage->packageDuration == 30 ? 'selected' : '' }}>
                                                        One Month</option>
                                                    <option value="90"
                                                        {{ $subscriptionPackage->packageDuration == 90 ? 'selected' : '' }}>
                                                        three Month</option>
                                                    <option value="180"
                                                        {{ $subscriptionPackage->packageDuration == 180 ? 'selected' : '' }}>
                                                        Six Month</option>
                                                    <option value="365"
                                                        {{ $subscriptionPackage->packageDuration == 365 ? 'selected' : '' }}>
                                                        One Year</option>
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

                                {{-- pricing description --}}
                                <h3 class="mt-3">Pricing Description</h3>
                                @foreach ($pricings as $priceing)
                                    <form action=" {{ url('admin/package/updates') }}" method="POST" class="data_foreach"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="main-form  ">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group mb-2">
                                                        <label for="">Icon/Logo</label>
                                                        <input type="file" name="logo" id="form_id_logo"
                                                            class="form-control">
                                                        <input type="hidden" name="logo_old" class="form-control"
                                                            value="{{ $priceing->logo }}">
                                                        <input type="hidden" name="id" id="invoice_id_user"
                                                            class="form-control" value="{{ $priceing->id }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 mt-4 text-center">
                                                    <div class="mt-1">
                                                        <img src="{{ asset('uploads/PricingLogo/' . $priceing->logo) }}"
                                                            height="28px" width="28px" alt="">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label for="">Pricing Description</label>
                                                        <textarea name="description" class="form-control" id="form_id_des" rows="1">{{ $priceing->description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 mt-4">
                                                    <button class="btn btn-sm btn-warning mt-2 d-none"
                                                        id="button_id{{ $priceing->id }}">update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach



                                <div class="paste-new-forms"></div>

                                <div class="float-end me-4 mt-2">
                                    <a href="javascript:void(0)" class="add-more-form  btn btn-success"><i
                                            class="bx bx-plus-medical"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->

                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

                <script>
                    $(document).on("change", "#form_id_logo,#form_id_des", function(e) {
                        e.preventDefault();
                        var template_id = $(this).closest(".data_foreach").find("#invoice_id_user").val();
                        $('#button_id' + template_id).removeClass('d-none');
                    });


                    $(document).ready(function() {

                        $(document).on('click', '.remove-btn', function() {
                            $(this).closest('.main-form').remove();
                        });

                        $(document).on('click', '.add-more-form', function() {
                            $('.paste-new-forms').append('<div class="main-form ">\
                                                <div class="row">\
                                                    <div class="col-sm-4">\
                                                        <div class="form-group ">\
                                                            <label for="">Icon/Logo</label>\
                                                            <input type="file" name="logo[]" class="form-control"  >\
                                                        </div>\
                                                    </div>\
                                                    <div class="col-sm-7">\
                                                        <div class="form-group mb-2">\
                                                            <label for="">Pricing Description</label>\
                                                                <textarea  name="description[]" class="form-control"   rows="1"></textarea>\
                                                        </div>\
                                                    </div>\
                                                    <div class="col-sm-1">\
                                                        <div class="form-group mb-2 mt-2">\
                                                            <br>\
                                                            <button type="button" class="remove-btn btn-sm btn btn-danger"> <i class="bx bx-trash-alt fs-4"></i></button>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                        </div>');
                        });

                    });
                </script>
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
