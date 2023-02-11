
 @if("1"==$invoiceData->template_name)
 @include('invoices.free.invoice_one')
 @elseif ("2"==$invoiceData->template_name)
 @include('invoices.free.invoice_two')
 @elseif ("3"==$invoiceData->template_name)
 @include('invoices.free.invoice_three')
 @elseif ("4"==$invoiceData->template_name)
 @include('invoices.free.invoice_four')
 @elseif ("5"==$invoiceData->template_name)
 @include('invoices.free.invoice_five')
 @elseif ("6"==$invoiceData->template_name)
 @include('invoices.free.invoice_six')
 @elseif ("7"==$invoiceData->template_name)
 @include('invoices.free.invoice_seven')
 @elseif ("8"==$invoiceData->template_name)
 @include('invoices.free.invoice_eight')
 @endif

