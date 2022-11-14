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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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

    </style>
@endpush
@section('frontend_content')
    <!-- Sub Nav Start -->
    <section class="sub_nav py-4 border-bottom">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="nav col">
                        <p class="m-0" style="display: flex;align-items: center;">You are here:&#160;<span><a
                                    href="/" class="nav-item hover">&#160;Home</a> &#8921;</span> <span
                                style="color: #FFB317 !important;">&#160;User</span></p>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('create') }}" class="btn billto_btn">Create Bill</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sub Nav Start -->
    <!-- Sign in form Start -->
    <section class="dashboard">
        <div>
            <div class="container my-5">
                <div class="text-center pb-5">
                    <h2 class="h2_title mb-4">Welcome back to Billto</h2>
                    <div class="dashboard_link">
                        <a class="" href="{{ route('create') }}">Invoice</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button" aria-disabled="true">Tax
                            Invoice</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button" aria-disabled="true">Proforma
                            Invoice</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button"
                            aria-disabled="true">Receipt</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button" aria-disabled="true">Sales
                            Receipt</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button" aria-disabled="true">Cash
                            Receipt</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button" aria-disabled="true">Quote</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button" aria-disabled="true">Estimate
                            Credit Memo</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button" aria-disabled="true">Credit
                            Note</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button" aria-disabled="true">Purchase
                            Order</a>
                        <a href="#" class="btn disabled" tabindex="-1" role="button" aria-disabled="true">Delivery
                            Note</a>
                    </div>
                </div>
                {{-- <div class="row dashboard_menu">
                    <div class="col-md-12 p-0">
                        <ul class="nav nav-tabs">
                            <li class="nav-item px-1">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <i class="bi bi-layout-text-sidebar-reverse"></i>
                                    My Invoices</a>
                            </li>
                            <li class="nav-item px-1">
                                <a class="nav-link btn disabled" aria-current="page" href="#" tabindex="-1" role="button" aria-disabled="true">
                                    <i class="bi bi-person-circle"></i>
                                    My Customers</a>
                            </li>
                            <li class="nav-item px-1">
                                <a class="nav-link btn disabled" aria-current="page" href="#" tabindex="-1" role="button" aria-disabled="true">
                                    <i class="bi bi-clipboard-data"></i>
                                    My Reports</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 p-3 p-md-5 border-start border-end border-bottom"
                        style="background: #F0F0F0;">
                        <ul class="nav nav-tabs pt-4">
                            <li class="nav-item">
                                <a class="nav-link p-2 active" aria-current="page" href="#">
                                    All Invoices <span class="badge bg-info rounded-pill">{{ $count }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 btn disabled" aria-current="page" href="#" tabindex="-1" role="button" aria-disabled="true">
                                    Overdue <span class="badge bg-dark rounded-pill">0</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 btn disabled" aria-current="page" href="#" tabindex="-1" role="button" aria-disabled="true">
                                    Unpaid <span class="badge bg-danger rounded-pill">0</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 btn disabled" aria-current="page" href="#" tabindex="-1" role="button" aria-disabled="true">
                                    Paid <span class="badge bg-success rounded-pill">0</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 btn disabled" aria-current="page" href="#" tabindex="-1" role="button" aria-disabled="true">
                                    send by Email <span class="badge bg-primary rounded-pill">0</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 btn disabled" aria-current="page" href="#" tabindex="-1" role="button" aria-disabled="true">
                                    send by Email <span class="badge bg-secondary rounded-pill">0</span></a>
                            </li>
                        </ul>
                        <div class="px-2 py-3 py-md-5 border-start border-end border-bottom rounded"
                            style="background: #fff;">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="bg-dark text-light text-center">
                                    <tr>
                                        <th>SL</th>
                                        <th>CUSTOMER</th>
                                        <th>NUMBER</th>
                                        <th>DATE</th>
                                        <th>PAID</th>
                                        <th>TOTAL</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($invoicessData as $key => $invoiceData)
                                    <tr class="border border-warning">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $invoiceData->invoice_to }}</td>
                                        <td>
                                            <a href="{{ route('invoice.download',$invoiceData->id) }}" target="_black" class="text-dark nav-link">
                                                {{ $invoiceData->invoice_id }}</a>
                                        </td>
                                        <td>{{ $invoiceData->invoice_date }}</td>
                                        <td>৳ {{ $invoiceData->invoice_amu_paid }}</td>
                                        <td>৳ {{ $invoiceData->total }}</td>
                                        <td class="text-center">
                                            <span class="btn btn-danger btn-sm" onclick="deleteInvoice({{ $invoiceData->id }})"><i class="bi bi-trash"></i></span>
                                            <a class="btn btn-primary btn-sm" href="{{ route('edit.invoice', $invoiceData->id) }}"><i class="bi bi-pencil-square"></i></a>
                                        </td>
                                    </tr>
                                    @empty

                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <section class="page-top">
        <div class="side-bar">

            <div class="logo text-center">
                <a href="index.html"><img src="{{ asset('assets/frontend/img/LOGO/circle_logo.png') }}" alt="Logo"></a>
                <h5 style="">Women In Digital</h5>
                <p>womenindigital.net@gmail.com</p>
                <a href="#" class="nav-icon"><i class="fa fa-bars"></i></a>
            </div>

            <div class="mobile_menu canvas-menu">
                <a href="#" class="nav-icon"><span aria-hidden="true">×</span></a>
                <nav class=''>
                    <ul>

                        <li class='sub-menu'><a href='#invoice'><img src="{{ asset('assets/frontend/img/icon/page.png') }}" alt="">My Invoices<div
                                    class='fa fa-caret-down right'></div></a>
                            <ul>
                                <li><a href='#invoice'>All Invoices</a></li>
                                <li><a href='#invoice'>Over Due</a></li>
                                <li><a href='#invoice'>Pertially Paid</a></li>
                                <li><a href='#invoice'>Unpaid</a></li>
                                <li><a href='#invoice'>Send by Email</a></li>
                                <li><a href='#invoice'>Trush</a></li>
                            </ul>
                        </li>
                        <li><a href='#'><img src="{{ asset('assets/frontend/img/icon/contact.png') }}" alt="">My Customers</a></li>
                        <li><a href='#'><img src="{{ asset('assets/frontend/img/icon/group.png') }}" alt="">My Reports</a></li>
                        <li><a href='#'><img src="{{ asset('assets/frontend/img/icon/settings.png') }}" alt="">Settings</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </section>
    <!-- Sign in form End -->
@endsection
@push('frontend_js')
    <script src="{{ asset('js/custom.js') }}"></script>
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
