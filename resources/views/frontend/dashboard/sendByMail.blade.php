@extends('frontend.all-invoice')
@section('display-none')
    d-none
@endsection
@section('d-block')
    d-block
@endsection
@section('SendbyEmail')
    active
@endsection
@section('SendbyEmail_bg')
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

    .iconTable{

    }
</style>
@section('dashboard_content')
    <div class="container-fluid overflow_scroll">
        <div class="row">
            <div class="card p-4 mt-2 table-responsive ">
                <table id="example" class="table table-hover  mt-1"  style="color:#686868"  >
                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th> Mail To</th>
                            <th>Subject</th>
                            <th>Body</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($sendByMails as $key => $sendByMail)
                            <tr class="m-0 p-0  data_table_id">
                                <td class="m-0  text-center ">{{ ++$key }}</td>
                                <td class="m-0  ">{{ $sendByMail->send_mail_to }}</td>
                                <td class="m-0  "> {{ $sendByMail->mail_subject }}</td>
                                <td class="m-0  ">{{ $sendByMail->mail_body }}</td>

                                <td class="m-0 text-center "> <a href="" class="preview_image_user btn_view text-center btn btn-sm"    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop_previw" ><i class="bi bi-eye iconTable"></i></a></td>
                                 <input type="hidden" id="invoice_id_user" value="{{ $sendByMail->invoice_tamplate_id }}">

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>



@endsection
