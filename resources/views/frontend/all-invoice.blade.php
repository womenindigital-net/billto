@extends('layouts.frontend.app')
@section('title', 'Home page')
@push('frontend_css')
    <!-- DataTables -->
    {{-- <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <!-- Responsive datatable examples -->
    {{-- <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" --}}
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
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}"> --}}
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
    </style>
@endpush
@section('frontend_content')
    <!-- Sub Nav Start -->
    <section class="sub_nav py-2 border-bottom">
        <div class="">
            <div class="container-fluid">
                <div class="row">
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
        <div class="row">
            <div class="col-sm-3 m-0">

                <section class="page-top ">
                    <div class="side-bar">
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

                <div class="container-fluid m-0 p-0 @yield('display-none')">
                    <div class="row mt-2 m-0 p-0">
                        <div class="col-sm-3">
                            <div class="card bg-c-blue order-card">
                                <div class="card-body d-flex">
                                    <div class="card-block text-center">
                                        <span>Total Invoice</span>
                                         <h4>120</h4>
                                    </div>
                                    <div class="text-center m-auto">
                                        <i class="bi bi-1-square"></i>
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rocket-takeoff" viewBox="0 0 16 16">
                                            <path d="M9.752 6.193c.599.6 1.73.437 2.528-.362.798-.799.96-1.932.362-2.531-.599-.6-1.73-.438-2.528.361-.798.8-.96 1.933-.362 2.532Z"/>
                                            <path d="M15.811 3.312c-.363 1.534-1.334 3.626-3.64 6.218l-.24 2.408a2.56 2.56 0 0 1-.732 1.526L8.817 15.85a.51.51 0 0 1-.867-.434l.27-1.899c.04-.28-.013-.593-.131-.956a9.42 9.42 0 0 0-.249-.657l-.082-.202c-.815-.197-1.578-.662-2.191-1.277-.614-.615-1.079-1.379-1.275-2.195l-.203-.083a9.556 9.556 0 0 0-.655-.248c-.363-.119-.675-.172-.955-.132l-1.896.27A.51.51 0 0 1 .15 7.17l2.382-2.386c.41-.41.947-.67 1.524-.734h.006l2.4-.238C9.005 1.55 11.087.582 12.623.208c.89-.217 1.59-.232 2.08-.188.244.023.435.06.57.093.067.017.12.033.16.045.184.06.279.13.351.295l.029.073a3.475 3.475 0 0 1 .157.721c.055.485.051 1.178-.159 2.065Zm-4.828 7.475.04-.04-.107 1.081a1.536 1.536 0 0 1-.44.913l-1.298 1.3.054-.38c.072-.506-.034-.993-.172-1.418a8.548 8.548 0 0 0-.164-.45c.738-.065 1.462-.38 2.087-1.006ZM5.205 5c-.625.626-.94 1.351-1.004 2.09a8.497 8.497 0 0 0-.45-.164c-.424-.138-.91-.244-1.416-.172l-.38.054 1.3-1.3c.245-.246.566-.401.91-.44l1.08-.107-.04.039Zm9.406-3.961c-.38-.034-.967-.027-1.746.163-1.558.38-3.917 1.496-6.937 4.521-.62.62-.799 1.34-.687 2.051.107.676.483 1.362 1.048 1.928.564.565 1.25.941 1.924 1.049.71.112 1.429-.067 2.048-.688 3.079-3.083 4.192-5.444 4.556-6.987.183-.771.18-1.345.138-1.713a2.835 2.835 0 0 0-.045-.283 3.078 3.078 0 0 0-.3-.041Z"/>
                                            <path d="M7.009 12.139a7.632 7.632 0 0 1-1.804-1.352A7.568 7.568 0 0 1 3.794 8.86c-1.102.992-1.965 5.054-1.839 5.18.125.126 3.936-.896 5.054-1.902Z"/>
                                          </svg> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-c-green order-card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <span>Total Invoice</span>
                                         <h4>120</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-c-yellow order-card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <span>Total Invoice</span>
                                         <h4>120</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <span>Total Invoice</span>
                                         <h4>120</h4>
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
