@extends('layouts.frontend.app')
@section('title', 'Home page')
@push('frontend_css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,500&display=swap"
        rel="stylesheet">
    <!--bootstrap css-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <!--dashboard custom css-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/datatable_css_custom.css') }}">
@endpush
@section('frontend_content')

    <section class="container-fluid bg-color ">
        <div class="row">
            <div class="col-md-3 col-lg-2 m-0 p-0">
                 <!-- user Dashboar sidebar  -->
               @include('frontend.dashboard.inc.sidebar')
                <!-- user Dashboar sidebar  -->
            </div>
            <div class="col-md-9 col-lg-10 m-0 p-0 mt-1">
                <div class="container-fluid overflow_scroll  m-0 p-0 ">
                    <div class="row mt-2 m-0 p-0">
                        <div class="col-md-12 col-lg-4">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="card  card_mb dashboad_card_width">
                                        <div class="card-header"
                                            style="background-image: url('{{ asset('assets/frontend/img/user_dashbord/dashboard_img.png') }}');  background-repeat: no-repeat; background-size: cover;  height:96px;">
                                            <div class="heading_tag_desh">
                                                <h1 class="welcome_back"> Welcome Back</h1>
                                                <p>WID Dashboard</p>
                                            </div>
                                        </div>
                                        @foreach ($user as $userItem )
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div
                                                        class="left_content_deshboard d-flex align-items-center justify-content-center">
                                                        <div class="image_deshboar">
                                                            <img src="{{ asset('assets/frontend/img/user_dashbord/logo.png') }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="address_user">
                                                        <p class="p-0 m-0"> {{ $userItem->email }}</p>

                                                    </div>
                                                    <div class="address_user_phone">
                                                        <p class="p-0 m-0">Phone Number:</p>
                                                        <span class="p-0 m-0">{{ $userItem->phone }}</span>
                                                    </div>

                                                </div>
                                                <div class="col-6">
                                                    <div class="address_user_phone">
                                                        <p class="p-0 m-0">Email Address:</p>
                                                        <span class="p-0 m-0"> {{ $userItem->email }}</span>
                                                    </div>
                                                    <div class="user_signeture">
                                                        <p class="p-0 m-0 mb-1">Signature</p>
                                                        <div class="d-flex align-items-center ">
                                                            <div class="Signature_img">
                                                                <img  src="{{ asset('uploads/signature/' . $userItem->signature) }}" alt="">
                                                            </div>
                                                            <div class="edit_signatuer_btn">
                                                                <a href="{{ url('/all/invoices/user-setting') }}" class="fs-4"> <i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <div class="card dashboad_card_width">
                                        <div class="card-body">
                                            <div class="earning_header">
                                                <span> Monthly Earning</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="monthly_total">
                                                        <span class="p-0 m-0">৳ 34,250</span>
                                                        <p class="p-0 m-0">July 2022 From</p>
                                                    </div>
                                                    <div class="monthly_previus">
                                                        <a href="#">Previous month</a>
                                                    </div>
                                                    <div
                                                        class="more_preview_btn d-flex justify-content-center align-items-center">
                                                        <a href="">View More</a>
                                                    </div>
                                                </div>
                                                @php
                                                    $total = 90;
                                                @endphp
                                                <div class="col-6 d-flex justify-content-center align-items-center">
                                                    <div
                                                        class="earning_graph  d-flex   justify-content-center align-items-center">
                                                        <div>
                                                            <div role="progressbar" class="bar " aria-valuenow="{{ $total }}" aria-valuemin="0" aria-valuemax="100" style="--value:{{ $total }}"></div>


                                                            {{-- <span>12%+ </span> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-8">
                            <div class="row">
                                <div class="col-6  col-md-4 col-lg-4">
                                    <div class="card  bg-c-pink">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="total_amount_left">
                                                    <p class=" ">Total Amount</p>
                                                    <span
                                                        class="">{{ number_format($Total_Amount_conut, 2) }}</span>
                                                </div>

                                                <div class="d-flex align-items-center ms-3">
                                                    <div style="height: 48px; width:48px; border-radius:50%; background-color:
                                                    #0072BC" class=" d-flex justify-content-center align-items-center">
                                                        <div class=""><i
                                                            class="bi bi-arrows-fullscreen fs-5 text-white"></i> </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6  col-md-4 col-lg-4">
                                    <div class="card  bg-c-pink">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="total_amount_left_paid">
                                                    <p class=" ">Paid Amount</p>
                                                    <span
                                                        class="">{{ number_format($paid_Amount_conut, 2) }}</span>
                                                </div>

                                                <div class="d-flex align-items-center ms-3">
                                                    <div style="height: 48px; width:48px; border-radius:50%; background-color:
                                                    #197B30" class=" d-flex justify-content-center align-items-center">
                                                        <div class=""><i class="bi bi-bag-check-fill text-white fs-4"></i> </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6  col-md-4 col-lg-4">
                                    <div class="card  bg-c-pink">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="total_amount_left_due">
                                                    <p class=" ">Due Amount</p>
                                                    <span
                                                        class="">{{ number_format($due_Amount_conut, 2) }}</span>
                                                </div>

                                                <div class="d-flex align-items-center ms-3">
                                                    <div style="height: 48px; width:48px; border-radius:50%; background-color:
                                                    #A950A0" class=" d-flex justify-content-center align-items-center">
                                                        <div class=""><i class="bi bi-bag-dash-fill fs-4 text-white"></i> </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-6 col-md-4 col-lg-4">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Invoice</p>
                                                <h4 class="mb-0">{{ $all_Invoice_Count }}</h4>
                                            </div>
                                            <div
                                                class="d-flex justify-content-end align-item-center  cir-pink-bg text-white px-4 rounded-circle">
                                                <div class="m-auto"><i class="bi bi-receipt fs-6"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card table-responsive">
                                        <div class="card-body">
                                            <div class="card_title">
                                                <p> Latest Transaction</p>
                                            </div>

                                            <table class="table table-hover table-responsive" style="color:#686868;   ">
                                                <thead
                                                    style="border-bottom: 2px solid #FFB317 !important;  border-top: 1px solid #FFB317 !important;">
                                                    <tr>
                                                        <th style="width:5%">SL#</th>
                                                        <th style="width:30%">CUSTOMER </th>
                                                        <th style="width:20%">DATE</th>
                                                        <th style="width:15%">STATUS</th>
                                                        <th style="width:15%">PAID</th>
                                                        <th style="width:15%">TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($latestDataInvoices as $key => $latestDataInvoice)
                                                    <tr class="data_table_id">
                                                        <th scope="row">{{ ++$key }}</th>
                                                        <td>{{ $latestDataInvoice->invoice_to }}</td>
                                                        <td>{{ $latestDataInvoice->invoice_date }}</td>
                                                        <td>
                                                            @if ($latestDataInvoice->status_due_paid=="due")
                                                            <div class="due_btn">
                                                                <a href="" class="preview_payment_user"data-bs-toggle="modal" data-bs-target="#staticBackdrop_paid_preview"> Due </a>

                                                            </div>
                                                            @elseif($latestDataInvoice->status_due_paid=="paid")
                                                            <div class="paid_btn">
                                                                <a href="">Paid </a>
                                                            </div>
                                                            @else
                                                            <div class="draft_btn">
                                                                <a href="">Draft </a>
                                                            </div>
                                                            @endif

                                                        </td>
                                                        <td>{{ number_format( $latestDataInvoice->receive_advance_amount,2) }}</td>
                                                        <td>{{number_format(  $latestDataInvoice->final_total,2 ) }}</td>

                                                        <input type="hidden" id="invoice_id_user" value="{{ $latestDataInvoice->id }}">
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Sign in form End -->
@endsection
@push('frontend_js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true,
            });
        });
    </script>
@endpush
