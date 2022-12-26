@extends('frontend.all-invoice')
@section('display-none')
    d-none
@endsection
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
    .custom_btn_sm {
        /* background-color: #f8f9fa;
        font-size: 18px;
        padding: 4px;
        width: 18px;
        height: 18px;
        border-radius: 3px; */

    }

    .iconTable{
        /* color: black !important;
        width: 9px !important;
        height: 11.25px !important;
        padding:5px; */
    }
</style>
@section('dashboard_content')
    <div class="container-fluid">

        <div class="row">
            <div class="card p-4 mt-2 table-responsive">
                <table id="example" class="table table-hover  mt-1 ">
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
@endsection
