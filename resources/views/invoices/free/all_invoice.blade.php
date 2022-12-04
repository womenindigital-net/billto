
 @if("1"==$invoiceData->template_name)
 @include('invoices.free.invoice_1')
 @elseif ("2"==$invoiceData->template_name)
 @include('invoices.free.index')
 @elseif ("3"==$invoiceData->template_name)
 @include('invoices.free.invoice_3')
 @elseif ("4"==$invoiceData->template_name)
 @include('invoices.free.invoice_4')
 @elseif ("5"==$invoiceData->template_name)
 @include('invoices.free.invoice_7')

 @include('invoices.free.invoice_6')
  @elseif ("3"==$invoiceData->template_name)
 @include('invoices.free.invoice_6')

 @endif
