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

    .iconTable{
        color: black !important;
        width: 9px !important;
        height: 11.25px !important;
        padding:5px;
    }
</style>
@section('dashboard_content')
    <div class="container-fluid">

        <div class="row">
            <div class="card p-4 mt-2 table-responsive">
                <table id="example" class="table table-striped table-hover border table-bordered mt-1 ">
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
                                <td class="m-0  ">৳ {{ $invoiceData->invoice_amu_paid }}</td>
                                <td class="m-0  ">৳ {{ $invoiceData->total }}</td>
                                <td class=" m-0  text-center">
                                    @if ($invoiceData->invoice_status == 'complete')
                                        <a class="custom_btn_sm  preview_image_user" href="#"  data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop_previw" ><i
                                                class="bi bi-eye iconTable"></i></a>
                                    @else
                                        <a class="custom_btn_sm  " href="{{ route('edit.invoice', $invoiceData->id) }}"><i
                                                class="bi bi-pencil-square iconTable"></i></a>
                                    @endif
                                </td>
                                <input type="hidden" id="invoice_id_user" value="{{ $invoiceData->id }}">

                            </tr>
                        @empty

                        @endforelse
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
