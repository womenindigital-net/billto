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
    <!-- Sign in form Start -->
    <section class="container-fluid bg-color ">
        <div class="row">
            <div class="col-md-3 m-0 p-0">
                <section class="page-top">
                    <div class="side-bar border_right">
                        <div class="logo design_logo text-center hide_mobile_view">
                            <a href="{{ route('all.invoice') }}"><img
                                    src="{{ asset('assets/frontend/img/LOGO/circle_logo.png') }}" alt="Logo"></a>
                            <h5 style="">Women In Digital</h5>
                            <p>womenindigital.net@gmail.com</p>
                            <span href="#" class="nav-icon"><i class="bi bi-list"></i></span>
                        </div>

                        <div class="mobile_menu canvas-menu">
                            <div class="text-center d-md-none mobile_sidebar">
                                <a href="{{ route('all.invoice') }}"><img
                                        src="{{ asset('assets/frontend/img/LOGO/circle_logo.png') }}" alt="Logo"></a>
                                <h5 style="">Women In Digital</h5>
                                <p>womenindigital.net@gmail.com</p>
                            </div>
                            <nav class='dash_menu @yield('custom_dash_menu') '>
                                <ul>
                                    <li class="sub-menu    @yield('all_invoice')">
                                        <a href='#invoice'><img src="{{ asset('assets/frontend/img/icon/page.png') }}"
                                                alt="">My Invoices
                                            <div class='fa fa-caret-down right'></div>
                                        </a>
                                        <ul class="@yield('d-block')">
                                            <li><a href="{{ url('my-all-invoice') }}" class="@yield('all-invoice')">All
                                                    Invoices</a></li>
                                            <li><a href='#invoice' class="@yield('over-view') ">Over Due</a></li>
                                            <li><a href='#invoice' class="@yield('Pertially') ">Pertially Paid</a></li>
                                            <li><a href='#invoice' class="@yield('Unpaid') ">Unpaid</a></li>
                                            <li><a href='#invoice' class="@yield('SendbyEmail') ">Send by Email</a></li>
                                            <li><a href='#invoice' class="@yield('Trush') ">Trush</a></li>
                                        </ul>
                                    </li>
                                    <li><a href='#'><img src="{{ asset('assets/frontend/img/icon/contact.png') }}"
                                                alt="">My Customers</a></li>
                                    <li><a href='#'><img src="{{ asset('assets/frontend/img/icon/group.png') }}"
                                                alt="">My Reports</a></li>
                                    <li><a href='{{ url('/all/invoices/user-setting') }}' class="@yield('setting')"><img
                                                src="{{ asset('assets/frontend/img/icon/settings.png') }}"
                                                alt="">Settings</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>

                </section>

            </div>

            <div class="col-md-9 m-0 p-0">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-12 text-end  margin_left">
                            <a href="{{ route('create') }}" class="btn btn-warning ">Create Bill</a>
                        </div>
                    </div>
                </div>
                @yield('dashboard_content')
                <div class="container-fluid  m-0 p-0 @yield('display-none')">
                    <div class="row mt-2 m-0 p-0">
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Invoice</p>
                                            <h4 class="mb-0">1,235</h4>
                                        </div>
                                        <div
                                            class="d-flex justify-content-end align-item-center  cir-pink-bg text-white px-4 rounded-circle">
                                            <div class="m-auto"><i class="bi bi-receipt fs-6"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card bg-c-pink">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 text-white">
                                            <p class="text-white fw-medium ">Total Invoice</p>
                                            <h4 class="mb-0 ">1,235</h4>
                                        </div>
                                        <div
                                            class="d-flex justify-content-end align-item-center text-white cir-pink-bg  px-4 rounded-circle">
                                            <div class="m-auto"><i class="bi bi-bell-slash fs-6"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-6 col-md-4 col-lg-3">
                            <div class="card bg-c-yellow ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 text-white">
                                            <p class="text-white fw-medium ">Total Invoice</p>
                                            <h4 class="mb-0 ">1,235</h4>
                                        </div>
                                        <div
                                            class="d-flex justify-content-end align-item-center text-white cir-pink-bg   px-4 rounded-circle">
                                            <div class="m-auto"><i class="bi bi-send fs-6"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6  col-md-4 col-lg-3">
                            <div class="card bg-c-green ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 text-white">
                                            <p class="text-white fw-medium ">Total Invoice</p>
                                            <h4 class="mb-0 ">1,235</h4>
                                        </div>
                                        <div
                                            class="d-flex justify-content-end align-item-center text-white  cir-pink-bg px-4 rounded-circle">
                                            <div class="m-auto"><i class="bi bi-bell-slash fs-6"></i> </div>
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
