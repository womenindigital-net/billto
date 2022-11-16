 @if("2"==$invoiceData->template_name)
 @include('invoices.free.invoice_1')
 @elseif ("3"==$invoiceData->template_name)
 @include('invoices.free.index')
 @endif


