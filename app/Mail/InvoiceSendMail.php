<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceSendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $template_id    ='';
    public $email_subject  ='';
    public $email_body     ='';
    public function __construct($template_id, $email_subject, $email_body )
    {
       $this->template_id = $template_id;
       $this->email_subject     = $email_subject;
       $this->email_body        = $email_body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject( $this->email_subject)->view('invoices.sendMail.index');
    }
}
