<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailCustomer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $param;
    public function __construct($parameter)
    {
        $this->param = $parameter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->param->subject)
                   ->view('email.customer_inquiry')
                   ->with(
                    [
                        'contact_person' => $this->param->contact_person,
                        'link_inquiry' => $this->param->link_inquiry
                    ]);
    }
}
