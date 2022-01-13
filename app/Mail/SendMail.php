<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data_email = $this->data;
        return $this->subject($data_email['subject'])
                    ->from(env('MAIL_FROM_ADDRESS', 'do-not-reply@company.com'))
                    ->view($data_email['view'])
                    ->with($data_email['data_email']);
    }
}
