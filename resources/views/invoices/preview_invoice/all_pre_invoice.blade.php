
@if("1"== $data->template_name)
@include('invoices.preview_invoice.invoice_pre_eighteen')
@elseif("2"== $data->template_name)
@include('invoices.preview_invoice.invoice_pre_two')
@include('invoices.preview_invoice.invoice_pre_one')
@elseif("3"== $data->template_name)
@include('invoices.preview_invoice.invoice_pre_three')
@elseif("4"== $data->template_name)
@include('invoices.preview_invoice.invoice_pre_four')
@elseif("5"== $data->template_name)
@include('invoices.preview_invoice.invoice_pre_five')
@elseif("6"== $data->template_name)
@include('invoices.preview_invoice.invoice_pre_six')

@endif


