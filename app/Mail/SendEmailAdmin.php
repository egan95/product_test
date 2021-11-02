<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailAdmin extends Mailable
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
                   ->view('email.admin_inquiry')
                   ->with(
                    [
                        'email' => $this->param->email,
                        'link_inquiry' => $this->param->link_inquiry,
                        'min_order' => $this->param->min_order,
                        'type' => $this->param->type
                    ]);
    }
}
