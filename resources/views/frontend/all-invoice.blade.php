@extends('layouts.frontend.app')
@section('title', 'Home page')
@push('frontend_css')
    <!-- DataTables -->
    {{-- <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <!-- Responsive datatable examples -->
    {{-- <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"> --}}
    {{-- type="text/css" /> --}}
    <!-- Multi Item Selection examples -->
    {{-- <link href="{{ asset('assets/admin/plugins/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}


    {{-- dashborad link --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,500&display=swap"
        rel="stylesheet">
    <!--bootstrap css-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <!--dashboard custom css-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/dashboard.css') }}">

    <style>
        .dataTables_filter,
        .datatable_length {
            margin-bottom: 10px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate,
        .dataTables_info {
            margin-top: 10px !important;
        }

        .order-card {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg, #4099ff, #73b4ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg, #2ed8b6, #59e0c5);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg, #FFB64D, #ffcb80);
        }

        .bg-c-pink {
            background: linear-gradient(45deg, #FF5370, #ff869a);
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding:5px  0px;
        }

        .order-card i {
            font-size: 26px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }
        .circle-bg {
            background-color: #d5d0d0;
        }
        .cir-pink-bg {
            background-color: #9a9494;
        }
    </style>
@endpush
@section('frontend_content')
    <!-- Sub Nav Start -->
    <section class="sub_nav py-2 border-bottom">
        <div class="">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="nav col">
                        <p class="m-0" style="display: flex;align-items: center;">You are here:&#160;<span><a
                                    href="/" class="nav-item hover">&#160;Home</a> &#8921;</span> <span
                                style="color: #FFB317 !important;">&#160;User</span></p>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('create') }}" class="btn btn-outline-warning ">Create Bill</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sub Nav Start -->
    <!-- Sign in form Start -->
    <section class="container-fluid bg-color ">
        <div class="row ">
            <div class="col-sm-3 m-0">

                <section class="page-top mb-5 ">
                    <div class="side-bar my-5">
                        <div class="logo text-center">
                            <a href="index.html"><img src="{{ asset('assets/frontend/img/LOGO/circle_logo.png') }}"
                                    alt="Logo"></a>
                            <h5 style="">Women In Digital</h5>
                            <p>womenindigital.net@gmail.com</p>
                            <a href="#" class="nav-icon"><i class="fa fa-bars"></i></a>
                        </div>

                        <div class="mobile_menu canvas-menu">
                            <a href="#" class="nav-icon"><span aria-hidden="true">×</span></a>
                            <nav class='dash_menu'>
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
            <div class="col-9 m-0 p-0">


                @yield('dashboard_content')

                <div class="container-fluid my-5 m-0 p-0 @yield('display-none')">
                    <div class="row mt-2 m-0 p-0">
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Invoice</p>
                                            <h4 class="mb-0">1,235</h4>
                                        </div>
                                        <div class="d-flex justify-content-end align-item-center  cir-pink-bg text-white px-4 rounded-circle">
                                            <div class="m-auto"><i class="bi bi-receipt fs-6"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-c-pink">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 text-white">
                                            <p class="text-white fw-medium ">Total Invoice</p>
                                            <h4 class="mb-0 ">1,235</h4>
                                        </div>
                                        <div class="d-flex justify-content-end align-item-center text-white cir-pink-bg  px-4 rounded-circle">
                                            <div class="m-auto"><i class="bi bi-bell-slash fs-6"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-c-yellow ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 text-white">
                                            <p class="text-white fw-medium ">Total Invoice</p>
                                            <h4 class="mb-0 ">1,235</h4>
                                        </div>
                                        <div class="d-flex justify-content-end align-item-center text-white cir-pink-bg   px-4 rounded-circle">
                                            <div class="m-auto"><i class="bi bi-send fs-6"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-c-green ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 text-white">
                                            <p class="text-white fw-medium ">Total Invoice</p>
                                            <h4 class="mb-0 ">1,235</h4>
                                        </div>
                                        <div class="d-flex justify-content-end align-item-center text-white  cir-pink-bg px-4 rounded-circle">
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
    <!-- Required datatable js -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.print.min.js') }}"></script>

    <!-- Key Tables -->
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.keyTable.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Selection table -->
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.select.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            // Default Datatable
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf']
            });

            // Key Tables

            $('#key-table').DataTable({
                keys: true
            });

            // Responsive Datatable
            $('#responsive-datatable').DataTable();

            // Multi Selection Datatable
            $('#selection-datatable').DataTable({
                select: {
                    style: 'multi'
                }
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
