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
use App\Models\Client;
use App\Models\ServiceRequest;
use App\Models\ServiceRequestDetail;
use App\Models\Category;
use App\Models\Service;
use App\Models\Name;

class AdminRequestController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $serviceRequests = ServiceRequest::where('client_project_status', 'Pending')
        ->orderBy('created_at', 'DESC')->get();

        $createdBy = Name::get();

        $data = [
            'serviceRequests'   =>  $serviceRequests,
            'createdBy'         =>  $createdBy,
        ];

        return view('admin.requests.requests', $data)->with('i');
    }

    public function requestDetails($ref){

        $requestDetail = ServiceRequest::findOrFail($ref);
        // return $requestDetail->cse;
        $data = [
            'requestDetail'   =>  $requestDetail,
        ];

        return view('admin.requests.request_details', $data);


    }
}
