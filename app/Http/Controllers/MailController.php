<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientRegistrationEmail;

class MailController extends Controller
{
    public static function clientEmailVerification($email, $email_verification_token, $clientName){
        $data = [
            'email'                     => $email,
            'email_verification_token'  => $email_verification_token,
            'client_name'  => $clientName,
        ];

        Mail::to($email)->send(new ClientRegistrationEmail($data));
    }
}
