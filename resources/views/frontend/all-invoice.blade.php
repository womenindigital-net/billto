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
<style>
    .circle {
        width: 20px;
        height: 20px;
        line-height: 21px;
        border-radius: 50%;
        font-size: 12px;
        color: #fff;
        text-align: center;
        float: right;
    }

    .myInvoiceIcon {
        border: 1px solid #898989;
        font-size: 16px;
        padding: 1px 3px 1px 3px;
        border-radius: 5px;
    }
</style>
@section('frontend_content')
    <!-- Sign in form Start -->
    <section class="container-fluid bg-color ">
        <div class="row">
            <div class="col-md-3 col-lg-2 m-0 p-0">
                <section class="page-top">
                    <div class="side-bar border_right">
                        @foreach ($user as $item)
                            <div class="logo design_logo text-center hide_mobile_view">
                                @if ($item->picture__input)
                                    <a href="{{ route('all.invoice') }}"><img
                                            src="{{ asset('uploads/userImage/' . $item->picture__input) }}"
                                            alt="Logo"></a>
                                @else
                                    <a href="{{ route('all.invoice') }}"><img
                                            src="{{ asset('uploads/defaultUserImage/avater.jpg') }}" alt="Logo"></a>
                                @endif
                                <h5 style="">Women In Digital</h5>
                                <p>{{ $item->email }}</p>
                                <span href="#" class="nav-icon"><i class="bi bi-list"></i></span>
                            </div>
                        @endforeach

                        @foreach ($user as $item)
                            <div class="mobile_menu canvas-menu">
                                <div class="text-center d-md-none mobile_sidebar">
                                    @if ($item->picture__input)
                                        <a href="{{ route('all.invoice') }}"><img
                                                src="{{ asset('uploads/userImage/' . $item->picture__input) }}"
                                                alt="Logo"></a>
                                    @else
                                        <a href="{{ route('all.invoice') }}"><img
                                                src="{{ asset('uploads/defaultUserImage/avater.jpg') }}"
                                                alt="Logo"></a>
                                    @endif

                                    <h5 style="">Women In Digital</h5>
                                    <p>{{ $item->email }}</p>
                                </div>
                                <div class="create_new_btn_sidebar">
                                    <a href="{{ route('create') }}" class="btn btn-warning btn-blog ">Create New
                                        Invoice</a>
                                </div>
                                <nav class='dash_menu @yield('custom_dash_menu') '>

                                    <ul>
                                        <li class="sub-menu    @yield('all_invoice')">
                                            <a class="mb-2" href='#invoice'><i class="bi bi-file-text myInvoiceIcon me-3"></i> My
                                                Invoices
                                                <div class='fa fa-caret-down mt-2'> <i class="bi bi-caret-down"></i></div>
                                            </a>
                                            <ul class="@yield('d-block')">
                                                <li><a href="{{ url('my-all-invoice') }}" class="@yield('all-invoice')">All
                                                        Invoices <span
                                                            class="circle @yield('all_invoice_left') submenu_circle_bg">{{ $all_Invoice_Count }}</span></a>
                                                </li>
                                                <li><a href='#invoice' class="@yield('over-view') ">Over Due <span
                                                            class="circle   submenu_circle_bg">0</span></a></li>
                                                <li><a href='#invoice' class="@yield('Pertially') ">Pertially Paid <span
                                                            class="circle submenu_circle_bg">0</span></a></li>
                                                <li><a href='#invoice' class="@yield('Unpaid') ">Unpaid <span
                                                            class="circle submenu_circle_bg">0</span></a></li>
                                                <li><a href='{{ url('/all/invoices/send-by-Mail') }}'
                                                        class="@yield('SendbyEmail') ">Send by Email <span
                                                            class="circle @yield('SendbyEmail_bg') submenu_circle_bg">{{ $sendByMail_count }}</span></a>
                                                </li>
                                                <li><a href='{{ url('/my-trash-invoice') }}' class="@yield('Trush') ">
                                                        Drafts <span
                                                            class="circle submenu_circle_bg">{{ $trash }}</span>
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="mb-2" href='#'><i class="bi bi-person-circle myInvoiceIcon me-3"></i> My Customers</a>
                                        </li>
                                        <li><a href='#'><i class="bi bi-bar-chart myInvoiceIcon me-3"></i> My Reports</a></li>
                                        <li><a href='{{ url('/all/invoices/user-setting') }}'
                                                class="@yield('setting')"> <i class="bi bi-gear-fill myInvoiceIcon me-3"></i> Settings</a>

                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>

            <style>
                .dashboad_card_width {
                    width: 100%;
                    height: 255px;
                }
            </style>
            <div class="col-md-9 col-lg-10 m-0 p-0 mt-1">
                @yield('dashboard_content')
                <div class="container-fluid overflow_scroll  m-0 p-0 @yield('display-none')">
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
                                                <div class="col-6 d-flex justify-content-center align-items-center">
                                                    <div
                                                        class="earning_graph  d-flex   justify-content-center align-items-center">
                                                        <div>
                                                            <span>12%+ </span>
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
                                                        class="">{{ number_format($Total_Amount_conut, 2) }}</span>
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
                                                        class="">{{ number_format($Total_Amount_conut, 2) }}</span>
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
                                {{-- <div class="col-6 col-md-4 col-lg-4">
                                <div class="card bg-c-pink">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1 text-white">
                                                <p class="text-white fw-medium ">Drafts Invoice</p>
                                                <h4 class="mb-0 ">{{ $trash }}</h4>
                                            </div>
                                            <div
                                                class="d-flex justify-content-end align-item-center text-white cir-pink-bg  px-4 rounded-circle">
                                                <div class="m-auto"><i class="bi bi-bell-slash fs-6"></i> </div>
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
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Bill to</td>
                                                        <td>10-12-2022</td>
                                                        <td>
                                                            <div class="paid_btn">
                                                                <a href="">paid </a>
                                                            </div>
                                                        </td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Bill to</td>
                                                        <td>10-12-2022</td>
                                                        <td>
                                                            <div class="due_btn">
                                                                <a href="">Due </a>
                                                            </div>
                                                        </td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Bill to</td>
                                                        <td>10-12-2022</td>
                                                        <td>
                                                            <div class="draft_btn">
                                                                <a href="">Draft </a>
                                                            </div>
                                                        </td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Bill to</td>
                                                        <td>10-12-2022</td>
                                                        <td>
                                                            <div class="paid_btn">
                                                                <a href="">paid </a>
                                                            </div>
                                                        </td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Bill to</td>
                                                        <td>10-12-2022</td>
                                                        <td>
                                                            <div class="due_btn">
                                                                <a href="">Due </a>
                                                            </div>
                                                        </td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Bill to</td>
                                                        <td>10-12-2022</td>
                                                        <td>
                                                            <div class="draft_btn">
                                                                <a href="">Draft </a>
                                                            </div>
                                                        </td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Bill to</td>
                                                        <td>10-12-2022</td>
                                                        <td>
                                                            <div class="draft_btn">
                                                                <a href="">Draft </a>
                                                            </div>
                                                        </td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                    </tr>
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
