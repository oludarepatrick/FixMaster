<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;

use App\Http\Controllers\MailController;
use App\Http\Controllers\EssentialsController;
use App\Http\Controllers\RecordActivityLogController;

use Auth;
use App\Models\User;
use App\Models\ServiceRequest;

class ServiceRequestController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //Validate user input fields
        $this->validateRequest();

        //Generate security code
        $this->randomStringGenerator = new EssentialsController();

        $createServiceRequest = ServiceRequest::create([
            'user_id'               =>  Auth::id(), 
            'service_id'            =>  $request->input('service_id'), 
            'category_id'           =>  $request->input('category_id'), 
            'security_code'         =>  'SEC-'.$this->randomStringGenerator->randomStringGenerator(6),
            'client_project_status' =>  '1',
        ]);
    }

    /**
     * Validate user input fields
     */
    private function validateRequest(){
        return request()->validate([
            'service_fee'           =>   'required',
            'description'           =>   'required',
            'timestamp'             =>   'required',
            'description'           =>   'required',
            'description'           =>   'required',
            'phone_number'          =>   'required',
            'address'               =>   'required',
            'payment_method'        =>   'required',
        ]);
    }
}
