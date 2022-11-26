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
@section('dashboard_content')
    <div class="container-fluid">

        <div class="row">
            <div class="card p-4 mt-2 table-responsive">
                <table id="example" class="table table-striped table-hover border table-bordered mt-1 ">
                    <thead>
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
                            <tr class="m-0 p-0 ">
                                <td class="m-0 p-0 ps-2 ">{{ ++$key }}</td>
                                <td class="m-0 p-0  ps-2">{{ $invoiceData->invoice_to }}</td>
                                <td class="m-0 p-0  ps-2">
                                    <a href="{{ route('invoice.download', $invoiceData->id) }}" target="_black"
                                        class="text-dark ">
                                        {{ $invoiceData->invoice_id }}</a>
                                </td>
                                <td class="m-0 p-0  ps-2">{{ $invoiceData->invoice_date }}</td>
                                <td class="m-0 p-0  ps-2">৳ {{ $invoiceData->invoice_amu_paid }}</td>
                                <td class="m-0 p-0  ps-2">৳ {{ $invoiceData->total }}</td>
                                <td class="text-center m-0 p-0"><a class="btn btn-primary btn-sm custom_btn_sm "
                                        href="{{ route('edit.invoice', $invoiceData->id) }}"><i
                                            class="bi bi-pencil-square"></i></a>
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
