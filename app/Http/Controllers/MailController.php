<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientRegistrationEmail;
use App\Mail\ClientDiscountEmail;
use App\Mail\ClientBookingEmail;
use App\Mail\AdminBookingEmailNotification;

class MailController extends Controller
{
    public static function clientEmailVerification($email, $email_verification_token, $clientName){
        $data = [
            'email'                     => $email,
            'email_verification_token'  => $email_verification_token,
            'clientName'                => $clientName,
        ];

        Mail::to($email)->send(new ClientRegistrationEmail($data));
    }

    public static function newClientDiscountMail($email, $clientName){

        $data = [
            'email'         => $email,
            'clientName'    => $clientName,
        ];

        Mail::to($email)->send(new ClientDiscountEmail($data));
    }

    public static function clientServiceBookingMail($email, $clientName, $jobReference, $securityCode, $serviceName, $categoryName, $amount, $serviceFeeName, $timestamp){
        $data = [
            'email'             =>  $email,
            'clientName'        =>  $clientName,
            'jobReference'      =>  $jobReference, 
            'securityCode'      =>  $securityCode, 
            'serviceName'       =>  $serviceName, 
            'categoryName'      =>  $categoryName,
            'amount'            =>  $amount,
            'serviceFeeName'    =>  $serviceFeeName,
            'timestamp'         =>  $timestamp,
        ];

        Mail::to($email)->send(new ClientBookingEmail($data));
    }

    public static function adminServiceBookingMailNotification($email, $clientName, $jobReference, $securityCode, $serviceName, $categoryName, $amount, $serviceFeeName, $timestamp){

        $data = [
            'email'             =>  $email,
            'clientName'        =>  $clientName,
            'jobReference'      =>  $jobReference, 
            'securityCode'      =>  $securityCode, 
            'serviceName'       =>  $serviceName, 
            'categoryName'      =>  $categoryName,
            'amount'            =>  $amount,
            'serviceFeeName'    =>  $serviceFeeName,
            'timestamp'         =>  $timestamp,
        ];

        Mail::to($email)->send(new AdminBookingEmailNotification($data));

    }

}
