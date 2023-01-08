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


{{-- home page css  --}}

@section('d-block')
    d-block
@endsection
@section('all-invoice')
    active
@endsection
@section('all_invoice_left')
    active_left
@endsection
@section('all_invoice')
    left_manu
@endsection

@section('frontend_content')

    <section class="container-fluid bg-color ">
        <div class="row">
            <div class="col-md-3 col-lg-2 m-0 p-0">
                <!-- user Dashboar sidebar  -->
                @include('frontend.dashboard.inc.sidebar')
                <!-- user Dashboar sidebar  -->
            </div>

            <div class="col-md-9 col-lg-10 m-0 p-0 mt-1">
                <div class="container-fluid overflow_scroll">
                    <div class="row mt-2">
                        <div class="card  table-responsive">
                            <div class="mt-1">
                                @if ($errors->any())
                                    <div class=" alert alert-danger p-0 m-0">
                                        <ul class="mt-2 text-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <form action="{{ route('search.result') }}" method="post">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-12 col-sm-12 col-md-2">
                                        <div class="all_invice_title pt-2 ">

                                            <p>All Invoice <span class="rond_all">{{ $all_Invoice_Count }}</span></p>

                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center m-0 p-0">
                                        <div class="custom_width" style="width: 30%">
                                            <span>Date From </span>
                                        </div>
                                        <div class="input-group bg-white custom_width_text" style="width: 70%">
                                            <label class="input-group-text" for="invoice_date"><i
                                                    class="bi bi-calendar3"></i></label>
                                            <input type="text"
                                                class="form-control  bg-white @error('from_date')  is-invalid @enderror"
                                                name="from_date" required id="invoice_date" readonly>
                                        </div>

                                    </div>

                                    <div
                                        class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center p-0">
                                        <div class="custom_width" style="width: 10%; text-align:center">
                                            <span>To</span>
                                        </div>
                                        <div class="input-group bg-white custom_width_text" style="width: 90%">
                                            <label class="input-group-text" for="invoice_dou_date"><i
                                                    class="bi bi-calendar3"></i></label>
                                            <input type="text"
                                                class="form-control  bg-white @error('to_date')  is-invalid @enderror"
                                                name="to_date" required id="invoice_dou_date" readonly>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center p-0">
                                        <div class="custom_width" style="width: 20%; text-align:center">
                                            <span>Status</span>
                                        </div>
                                        <div class="input-group bg-white custom_width_text" style="width: 80%">
                                            <select class="form-select  @error('invoice_status')  is-invalid @enderror"
                                                id="inputGroupSelect01" name="invoice_status" required>
                                                <option value="paid">Paid</option>
                                                <option value="due">Due</option>
                                                {{-- <option value="draft">Draft</option> --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-1 d-flex justify-content-end align-items-center">
                                        <div class="input-group   mr_custom">
                                            <button class=" btn btn-warning ">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div style=" margin-top:25px"></div>
                            <table class="table table-hover btn_design" style="color:#686868" id="cart_realaod_table">
                                <thead
                                    style="border-bottom: 2px solid #FFB317 !important; border-top: 1px solid #FFB317 !important;">
                                    <tr>
                                        <th style="width: 8%">SL#</th>
                                        <th style="width: 20%">CUSTOMER </th>
                                        <th style="width: 15%">DATE</th>
                                        <th style="width: 15%">STATUS</th>
                                        <th style="width: 15%">PAID</th>
                                        <th style="width: 15%">TOTAL</th>
                                        <th style="width:12%">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($allInvoiceDatas as $key => $InvoiceData)
                                        <tr class="data_table_id table_th_td">
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $InvoiceData->invoice_to }}</td>
                                            <td>{{ $InvoiceData->invoice_date }}</td>
                                            <td>
                                                @if ($InvoiceData->status_due_paid == 'due')
                                                    <div class="due_btn">
                                                        <a href="" class="preview_payment_user"data-bs-toggle="modal" data-bs-target="#staticBackdrop_paid_preview"> Due </a>
                                                    </div>
                                                @elseif($InvoiceData->status_due_paid == 'paid')
                                                    <div class="paid_btn">
                                                        <a href="#">Paid </a>
                                                    </div>
                                                @else
                                                    <div class="draft_btn">
                                                        <a href="#">Draft </a>
                                                    </div>
                                                @endif
                                            </td>
                                            <td> {{ number_format($InvoiceData->receive_advance_amount, 2) }}</td>

                                            <td> {{ number_format($InvoiceData->final_total, 2) }} </td>
                                            <td>
                                                {{-- <a href="" class="btn btn-sm btn_view"> <i class="bi bi-eye "></i></a> --}}
                                                <a href="" class="preview_image_user btn btn-sm btn_view"
                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop_previw"><i
                                                        class="bi bi-eye "></i></a>

                                                @if ($InvoiceData->status_due_paid == 'paid')
                                                send || download
                                                @else
                                                <a href="{{ route('edit.invoice', $InvoiceData->id) }}"
                                                    class="btn btn-sm btn_edit"> <i class="bi bi-pencil"></i></a>
                                                <a href="" class="btn btn-sm btn_delte"> <i
                                                        class="bi bi-trash "></i></a>
                                                @endif


                                            </td>
                                            <input type="hidden" id="invoice_id_user" value="{{ $InvoiceData->id }}">

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-4 col-sm-6 col-md-7">
                                    {{ $allInvoiceDatas->links() }}
                                </div>
                                <div class="col-8 col-sm-6 col-md-5">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="total_text_design"> TOTAL</p>
                                        </div>
                                        <div class="col-8">
                                            <p class="total_amount ">{{ number_format($Total_Amount_conut, 2) }}</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="total_text_design "> PAID AMOUNT</p>
                                        </div>
                                        <div class="col-8">
                                            <p class="total_amount ">{{ number_format($paid_Total_Amount_conut, 2) }}</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="total_text_design"> BALANCE DUE</p>
                                        </div>
                                        <div class="col-8">
                                            <p class="total_amount ">{{ number_format($due_Total_Amount_conut, 2) }}</p>
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
