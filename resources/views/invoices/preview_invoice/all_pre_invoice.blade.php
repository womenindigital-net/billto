@if("1"== $data->template_name)
@include('invoices.preview_invoice.invoice_pre_one')
@elseif("2"== $data->template_name)
@include('invoices.preview_invoice.invoice_pre_two')
@elseif("3"== $data->template_name)
@include('invoices.preview_invoice.invoice_pre_two')

@endif
