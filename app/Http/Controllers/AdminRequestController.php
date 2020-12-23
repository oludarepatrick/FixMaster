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
use App\Models\CSE;
use App\Models\Technician;
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

        $serviceRequests = ServiceRequest::NewRequests()->get();

        $createdBy = Name::get();

        $data = [
            'serviceRequests'   =>  $serviceRequests,
            'createdBy'         =>  $createdBy,
        ];

        return view('admin.requests.requests', $data)->with('i');
    }

    public function requestDetails($ref){

        $requestDetail = ServiceRequest::findOrFail($ref);

        $cses = User::select('id', 'created_at', 'email', 'is_active')
        ->with(['cses' => function($query){
            return $query->select('tag_id', 'gender', 'phone_number', 'town', 'user_id');
        }])
        ->with(['fullName' => function($name){
            return $name->select(['name', 'user_id']);
        }])
        ->where('users.designation', '[CSE_ROLE]')
        ->where('users.is_active', '1')
        ->latest('users.created_at')
        ->get();

        $technicians = User::select('id', 'created_at', 'email', 'is_active')
        ->with(['technicians' => function($query){
            return $query->select('tag_id', 'gender', 'phone_number', 'town', 'user_id');
        }])
        ->with(['fullName' => function($name){
            return $name->select(['name', 'user_id']);
        }])
        ->where('users.designation', '[TECHNICIAN_ROLE]')
        ->where('users.is_active', '1')
        ->latest('users.created_at')
        ->get();

        // return $cses;

        $data = [
            'requestDetail' =>  $requestDetail,
            'cses'          =>  $cses,
            'technicians'   =>  $technicians,
        ];

        return view('admin.requests.request_details', $data);
    }

    public function assignCSETechnician(Request $request, $id){

        $requestExists = ServiceRequest::findOrFail($id);

        $request->validate([
            'cse_id'            => 'required',
            'technician_id'     => 'required',
        ]);

        $assignCSETechnician = ServiceRequest::where('id', $id)->update([

        ]);
        return $request;

    }
}
