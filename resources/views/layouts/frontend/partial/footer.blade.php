<style>
    .spinner {
        width: 80px;
        height: 80px;

        border: 2px solid #f3f3f3;
        border-top: 3px solid #f25a41;
        border-radius: 100%;

        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;

        animation: spin 1s infinite linear;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
{{-- preview paid amount  alert  --}}
<div class="modal fade" id="staticBackdrop_paid_preview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header priviewModel">
                <h5 class="modal-title " id="staticBackdropLabel">New payment</h5>
                <button type="button" id="stop_btn" class="btn-close stop_btn " data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0.5rem 1rem 0rem 1rem;">
                <div class="row">
                    <form action="{{ route('payment.save') }}" method="POST">
                        @csrf
                    <div class="preview_invoice_show1">

                    </div>
                    <div class="modal-footer modal_footer ">
                        <button type="button" class="btn btn-outline-danger btn-sm "
                            data-bs-dismiss="modal"> <i class="bi bi-x-circle"></i> Cancel</button>
                        <button class="btn  btn-sm btn-warning disabled"  id="submit_btn"><i class="bi bi-clipboard-plus"></i> Submit  </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- =====================send mail user dashboard=========================== --}}
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">New Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="last_invoice_id" name="template_id">
                    <div class="mb-3">
                        <label for="emai_to" class="form-label">To</label>
                        <input type="email" class="form-control" id="emai_to" name="emai_to" placeholder="example@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="email_subject" name="email_subject" id="Input2" value="A Invoice by Billto.io" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_body" class="form-label">Body</label>
                        <textarea class="form-control" id="email_body" name="email_body" rows="2">A invoice has been sent to you by BillTo.io. You can find it in the attachment below.</textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger btn-sm " data-bs-dismiss="modal"> <i class="bi bi-x-circle"></i> Close</button>
                        <button id="send_mail_data" class="btn send-invoice btn-sm btn-outline-warning"><i class="bi bi-send"></i>
                            Send Mail</button>
                        {{-- <button class="btn send-invoice btn-sm btn-outline-warning"><i class="bi bi-send"></i>
                            Send Mail</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ==================================================== --}}


{{-- preview image alert  --}}
<div class="modal fade" id="staticBackdrop_previw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header priviewModel">
                <h5 class="modal-title" id="staticBackdropLabel">Preview Invoice</h5>
                <button type="button" id="stop_btn" class="btn-close stop_btn save_btn_anable" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0.5rem 1rem 0rem 1rem;">
                <div class="row">
                    <div class="preview_invoice_show">
                        <div id="overlay">
                            <div class="spinner"></div>
                        </div>

                    </div>
                    <div class="modal-footer modal_footer">
                        <button type="button" class="btn btn-outline-danger btn-sm save_btn_anable"
                            data-bs-dismiss="modal"> <i class="bi bi-x-circle"></i> Close</button>
                        {{-- <button class="btn send-invoice btn-sm btn-outline-warning"><i class="bi bi-send"></i>
                                Download Image </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<style>
    .text_abc a {
        text-decoration: none;
    }
</style>
<footer class="footer_section">
    <div style="background-color: #FFB317;">
        <div class="container">
            <div class="py-4 row">
                <div class="col-md-6 text-center text-md-start text_abc">
                    <a href="{{ url('/clear-cache') }}">
                        <p>© 2022 Billto. All rights reserved.</p>
                    </a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p>Design And Developed By <a href="#">Women In Digital</a> | <a href="#">Lumina
                            Dev</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
