<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

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
        $data = $this->data;

        // return $this->from(env('MAIL_USERNAME'), 'Al-Daar Marriage Service')->subject('Welcome to Al-Daar Marriage Service')->view('mail.email-confirmation-body', compact('data'));
        $token_url = 'http://localhost:8000/client-email-verify?token='.$this->data['email_verification_token'];

        return $this->from('test@ninthbinary.com', 'FixMaster - Welcome to FixMaster!')->subject('Welcome to FixMaster!')->markdown('mail.client_registered', compact('data', 'token_url'));
    }
}
