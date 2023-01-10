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
                                                <button style="background-color: #686868" type="button" id="send_email_id"
                                                class="btn btn-sm btn_edit send_invoice_mail" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="bi bi-envelope-fill"></i>
                                            </button>
                                            <a style="background-color: #686868" href="/invoice/download/{{ $InvoiceData->id }}" target="_blank"
                                            class="btn btn-sm btn_edit "> <i
                                                class="bi bi-cloud-arrow-down "></i> </a>
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

        <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <input type="hidden"  id="last_invoice_id" name="template_id">
                        <div class="mb-3">
                            <label for="emai_to" class="form-label">To</label>
                            <input type="email" class="form-control" id="emai_to" name="emai_to"
                                placeholder="example@gmail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="email_subject" name="email_subject"
                                id="Input2" value="A Invoice by Billto.io" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_body" class="form-label">Body</label>
                            <textarea class="form-control" id="email_body" name="email_body" rows="2">A invoice has been sent to you by BillTo.io. You can find it in the attachment below.</textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger btn-sm " data-bs-dismiss="modal"> <i
                                    class="bi bi-x-circle"></i> Close</button>
                            <button id="send_mail_data" class="btn send-invoice btn-sm btn-outline-warning"><i
                                    class="bi bi-send"></i>
                                Send Mail</button>
                            {{-- <button class="btn send-invoice btn-sm btn-outline-warning"><i class="bi bi-send"></i>
                                        Send Mail</button> --}}
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
