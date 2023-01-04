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


@section('d-block')
    d-block
@endsection
@section('Trush')
    active
@endsection
@section('Trush')
    left_manu
@endsection
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

<style>
    .custom_btn_sm {
        background-color: #f8f9fa;
        font-size: 18px;
        padding: 4px;
        width: 18px;
        height: 18px;
        border-radius: 3px;

    }

    .iconTable {
        color: black !important;
        width: 9px !important;
        height: 11.25px !important;
        padding: 5px;
    }

    /* .border_top{
        border-top: 1px solid rgb(175, 175, 175) !important;
    } */

    table.dataTable tfoot tr,
    table.dataTable tfoot td {
        border-top: 1px solid #dbdbdb !important;
    }
</style>
{{-- home page css  --}}



<style>
    @media all and (max-width: 575px) {
        .custom_width {
            width: 30% !important;
        }

        .custom_width_text {
            width: 50% !important;
            margin-bottom: 8px;
        }

        .mr_custom {
            display: flex;
            justify-content: center;
            margin-right: 10px;
        }
    }

    @media all and (max-width: 768px) {
        .custom_width {
            width: 30% !important;
        }

        .custom_width_text {
            width: 70% !important;
            margin-bottom: 8px;
        }

    }
</style>


@section('frontend_content')

    <section class="container-fluid bg-color ">
        <div class="row">
            <div class="col-md-3 col-lg-2 m-0 p-0">
                 <!-- user Dashboar sidebar  -->
               @include('frontend.dashboard.inc.sidebar')
                <!-- user Dashboar sidebar  -->
            </div>

            <style>
                .dashboad_card_width {
                    width: 100%;
                    height: 255px;
                }
            </style>
            <div class="col-md-9 col-lg-10 m-0 p-0 mt-1">
                <div class="container-fluid overflow_scroll">

                    <div class="row">
                        <div class="card p-4 mt-2 table-responsive">
                            <table id="example" class="table table-hover  mt-1 " style="color: #686868">
                                <thead>
                                    <tr>
                                        <th class="text-center">SL</th>
                                        <th>CUSTOMER</th>
                                        <th>NUMBER</th>
                                        <th>DATE</th>
                                        <th>PAID</th>
                                        <th>TOTAL</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($invoicessData as $key => $invoiceData)
                                        <tr class="m-0 p-0 ">
                                            <td class="m-0  text-center ">{{ ++$key }}</td>
                                            <td class="m-0  ">{{ $invoiceData->invoice_to }}</td>
                                            <td class="m-0   ">
                                                {{ $invoiceData->invoice_id }}
                                            </td>
                                            <td class="m-0  ">{{ $invoiceData->invoice_date }}</td>
                                            <td class="m-0  ">{{ $invoiceData->currency }} {{ $invoiceData->invoice_amu_paid }}</td>
                                            <td class="m-0  ">{{ $invoiceData->currency }} {{ $invoiceData->total }}</td>
                                            <td class=" m-0  text-center">
                                                @if ($invoiceData->invoice_status == 'complete')
                                                    <a class="custom_btn_sm" href=""><i
                                                            class="bi bi-eye iconTable"></i></a>
                                                @else
                                                    <a class="custom_btn_sm btn_view btn btn-sm" href="{{ route('edit.invoice', $invoiceData->id) }}"><i class="bi bi-pencil"></i></a>
                                                    <a href="" class="btn btn-sm btn_delte"> <i class="bi bi-trash "></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>

                            </table>
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
