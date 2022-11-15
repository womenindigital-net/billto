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

                                    <li class='sub-menu '><a href='#invoice'><img
                                                src="{{ asset('assets/frontend/img/icon/page.png') }}" alt="">My
                                            Invoices
                                            <div class='fa fa-caret-down right'></div>
                                        </a>

                                        <ul class="@yield('d-block')">
                                            <li><a href="{{ url('my-all-invoice') }}" class="@yield('all-invoice')">All Invoices</a></li>
                                            <li><a href='#invoice' class="@yield('over-view') ">Over Due</a></li>
                                            <li><a href='#invoice'  class="@yield('Pertially') " >Pertially Paid</a></li>
                                            <li><a href='#invoice' class="@yield('Unpaid') ">Unpaid</a></li>
                                            <li><a href='#invoice' class="@yield('SendbyEmail') ">Send by Email</a></li>
                                            <li><a href='#invoice'  class="@yield('Trush') " >Trush</a></li>
                                        </ul>
                                    </li>
                                    <li><a href='#'><img src="{{ asset('assets/frontend/img/icon/contact.png') }}"
                                                alt="">My Customers</a></li>
                                    <li><a href='#'><img src="{{ asset('assets/frontend/img/icon/group.png') }}"
                                                alt="">My Reports</a></li>
                                    <li><a href='#'><img src="{{ asset('assets/frontend/img/icon/settings.png') }}"
                                                alt="">Settings</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>

                </section>

            </div>
            <div class="col-9 m-0 p-0">


                @yield("dashboard_content")

                <div class="container-fluid m-0 p-0 @yield('display-none')">
                    <div class="row mt-2 m-0 p-0">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <span>Total Invoice</span>
                                    <h4>120</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <span>Total Invoice</span>
                                    <h4>120</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <span>Total Invoice</span>
                                    <h4>120</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <span>Total Invoice</span>
                                    <h4>120</h4>
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
