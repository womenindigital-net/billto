@extends('frontend.all-invoice')
@section('display-none')
    d-none
@endsection
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
<style>

    @media all and (max-width: 575px) {
        .custom_width{
            width: 30% !important;
        }
        .custom_width_text {
            width: 50% !important;
            margin-bottom: 8px;
        }
        .mr_custom{
            display:flex;
            justify-content: center;
            margin-right: 10px;
        }
    }

    @media all and (max-width: 768px) {
        .custom_width{
            width: 30% !important;
        }
        .custom_width_text {
            width: 70% !important;
            margin-bottom: 8px;
        }

    }

    </style>
@section('dashboard_content')
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
                <form action="{{ route('search.result') }}"  method="post">
                    @csrf
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-2">
                        <div class="all_invice_title pt-2 ">

                            <p>All Invoice <span class="rond_all">{{  $all_Invoice_Count }}</span></p>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center m-0 p-0">
                        <div class="custom_width" style="width: 30%">
                            <span>Date From </span>
                        </div>
                        <div class="input-group bg-white custom_width_text" style="width: 70%">
                            <label class="input-group-text" for="invoice_date"><i class="bi bi-calendar3"></i></label>
                            <input type="text" class="form-control  bg-white @error('from_date')  is-invalid @enderror" name="from_date" required id="invoice_date" readonly>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center p-0">
                        <div class="custom_width" style="width: 10%; text-align:center">
                            <span>To</span>
                        </div>
                        <div class="input-group bg-white custom_width_text" style="width: 90%">
                            <label class="input-group-text" for="invoice_dou_date" ><i class="bi bi-calendar3"></i></label>
                            <input type="text" class="form-control  bg-white @error('to_date')  is-invalid @enderror"  name="to_date" required  id="invoice_dou_date" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center p-0">
                        <div class="custom_width" style="width: 20%; text-align:center">
                            <span>Status</span>
                        </div>
                        <div class="input-group bg-white custom_width_text" style="width: 80%">
                            <select class="form-select  @error('invoice_status')  is-invalid @enderror" id="inputGroupSelect01" name="invoice_status" required>
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
                <table class="table table-hover btn_design" style="color:#686868">
                    <thead style="border-bottom: 2px solid #FFB317 !important; border-top: 1px solid #FFB317 !important;">
                      <tr >
                        <th style="width: 8%">SL#</th>
                        <th style="width: 20%">CUSTOMER </th>
                        <th style="width: 15%">DATE</th>
                        <th style="width: 15%" >STATUS</th>
                        <th style="width: 15%">PAID</th>
                        <th style="width: 15%">TOTAL</th>
                        <th style="width:12%">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $final_total = 0;
                            $paid_total = 0;
                            $due_total = 0;
                        @endphp
                        @foreach ($allInvoiceDatas as $key => $InvoiceData )
                      <tr class="data_table_id">
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $InvoiceData->invoice_to }}</td>
                        <td>{{ $InvoiceData->invoice_date }}</td>
                        <td>
                            @if ($InvoiceData->status_due_paid=="due")
                            <div class="due_btn">
                                <a href=""> Due </a>
                            </div>
                            @elseif($InvoiceData->status_due_paid=="paid")
                            <div class="paid_btn">
                                <a href="">Paid </a>
                            </div>
                            @else
                            <div class="draft_btn">
                                <a href="">Draft </a>
                            </div>
                            @endif
                        </td>
                        <td> {{number_format($InvoiceData->receive_advance_amount,2 ) }}</td>

                        <td> {{number_format($InvoiceData->final_total,2 ) }} </td>
                        <td>
                            {{-- <a href="" class="btn btn-sm btn_view"> <i class="bi bi-eye "></i></a> --}}
                            <a href="" class="preview_image_user btn btn-sm btn_view"    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop_previw" ><i class="bi bi-eye "></i></a>
                            <a href="{{ route('edit.invoice', $InvoiceData->id) }}" class="btn btn-sm btn_edit"> <i class="bi bi-pencil"></i></a>
                            <a href="" class="btn btn-sm btn_delte"> <i class="bi bi-trash "></i></a>
                        </td>
                         <input type="hidden" id="invoice_id_user" value="{{ $InvoiceData->id }}">

                      </tr>
                      @php
                      $final_total += $InvoiceData->final_total;
                      $paid_total += $InvoiceData->receive_advance_amount;
                      $due_total += $InvoiceData->balanceDue_amounts;
                      @endphp
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
                               <p class="total_amount " >{{ number_format($final_total,2) }}</p>
                            </div>
                            <div class="col-4">
                                <p class="total_text_design "> PAID AMOUNT</p>
                              </div>
                              <div class="col-8">
                                 <p class="total_amount " >{{ number_format($paid_total,2) }}</p>
                              </div><div class="col-4">
                                <p class="total_text_design"> BALANCE DUE</p>
                              </div>
                              <div class="col-8">
                                 <p class="total_amount " >{{ number_format($due_total,2) }}</p>
                              </div>

                        </div>
                    </div>
                  </div>
            </div>
        </div>

        <div class="row d-none">
            <div class="card p-4 mt-2 table-responsive">
                <table id="example" class="table  table-hover border table-bordered mt-1 ">
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
                            <tr class="m-0 p-0 data_table_id">
                                <td class="m-0  text-center ">{{ ++$key }}</td>
                                <td class="m-0  ">{{ $invoiceData->invoice_to }}</td>
                                <td class="m-0   ">
                                    {{-- <a href="{{ route('invoice.download', $invoiceData->id) }}" target="_black"
                                        class="text-dark ">
                                        {{ $invoiceData->invoice_id }}</a> --}}
                                    {{ $invoiceData->invoice_id }}
                                </td>
                                <td class="m-0  ">{{ $invoiceData->invoice_date }}</td>
                                <td class="m-0  ">
                                    @if ($invoiceData->invoice_amu_paid != '')
                                        {{ $invoiceData->currency }} {{ number_format($invoiceData->invoice_amu_paid, 2) }}
                                    @endif
                                </td>
                                <td class="m-0  ">{{ $invoiceData->currency }} {{ number_format($invoiceData->total, 2) }}
                                </td>
                                <td class=" m-0  text-center">
                                    @if ($invoiceData->invoice_status == 'complete')
                                        <a class="custom_btn_sm  preview_image_user" href="#" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop_previw"><i class="bi bi-eye iconTable"></i></a>
                                    @else
                                        <a class="custom_btn_sm  " href="{{ route('edit.invoice', $invoiceData->id) }}"><i
                                                class="bi bi-pencil-square iconTable"></i></a>
                                    @endif
                                </td>

                            </tr>
                        @empty
                        @endforelse
                    </tbody>

                    <tfoot>
                        <tr class=" border-0">
                            <td colspan="7" class=" border-0 text-white">.</td>
                        </tr>
                        <tr class="border-0">
                            <th colspan="6" class="border-0">Total</th>
                            <th class=" border-0"> {{ number_format($Total_Amount_conut, 2) }}</th>
                        </tr>

                        <tr class="border-0">
                            <th colspan="6" class="border-0"> </th>
                            <th class=" border-0 text-white"> .</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection

