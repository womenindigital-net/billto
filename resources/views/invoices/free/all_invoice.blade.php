
 @if("1"==$invoiceData->template_name)
 @include('invoices.free.invoice_7')
  @elseif ("3"==$invoiceData->template_name)
 @include('invoices.free.invoice_7')
 @endif
