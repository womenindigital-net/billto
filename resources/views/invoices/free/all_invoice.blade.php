 @if("template_1"==$invoiceData->template_name)
 @include('invoices.free.invoice_1')
 @elseif ("template_2"==$invoiceData->template_name)
 @include('invoices.free.invoice_2')
 @endif


