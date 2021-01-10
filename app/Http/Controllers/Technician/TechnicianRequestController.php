<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Technician;
use App\Models\ServiceRequest;
use App\Models\ServiceRequestStatus;


class TechnicianRequestController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function requests(){

        $technicianServiceRequests = Auth::user()->technicianRequests()->orderBy('created_at', 'DESC')->get();

        // return $cseServiceRequests;

        $data = [
            'technicianServiceRequests'   =>  $technicianServiceRequests,
        ];

        return view('technician.requests', $data)->with('i');
    }

    public function requestDetails($id){

        $requestDetail = ServiceRequest::findOrFail($id);

        $serviceRequestProgreses =  $requestDetail->serviceRequestProgreses;

        $serviceRequestStatuses = ServiceRequestStatus::RequestUpdateStatuses()->get();

        $data = [
            'requestDetail'             =>  $requestDetail,
            'serviceRequestProgreses'   =>  $serviceRequestProgreses,
            'serviceRequestStatuses'    =>  $serviceRequestStatuses,
        ];

        return view('technician.request_details', $data)->with('i');
    }
}
