@extends('frontend.all-invoice')
@section('display-none') d-none @endsection
@section('d-block') d-block @endsection
@section('all-invoice') active @endsection
@section('all_invoice') left_manu @endsection
@section("dashboard_content")
            <div class="container-fluid my-5 m-0 p-0 ">
                <div class="row mt-2 m-0 p-0 ">
                            <div class="col-md-12 p-3 p-md-5 border-start border-end border-bottom rounded"  style="background: #F0F0F0;">
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
                    </div>
                </div>
            </div>


@endsection
