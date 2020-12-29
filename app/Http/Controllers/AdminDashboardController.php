<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Client;
use App\Models\CSE;
use App\Models\Technician;
use App\Models\ServiceRequest;

class AdminDashboardController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        //Get Total requests
        $totalRequests = ServiceRequest::get()->count();

        //Get total Pending requests
        $totalPendingRequests = ServiceRequest::where('service_request_status_id', '1')->get()->count();

        //Get total Cancelled requests
        $totalCancelledRequests = ServiceRequest::where('service_request_status_id', '2')->get()->count();

        //Get total Completed requests
        $totalCompletedRequests = ServiceRequest::where('service_request_status_id', '3')->get()->count();

        //Get total Ongoing requests
        $totalOngoingRequests = ServiceRequest::where('service_request_status_id', '>', '3')->get()->count();

        //Get Total Admins
        $totalAdmins = Admin::get()->count();

        //Get Total Clients
        $totalClients = Client::get()->count();

        //Get Total Cses
        $totalCses = CSE::get()->count();

        //Get Total Technicians
        $totalTechnicians = Technician::get()->count();

        //Get Total Users
        $totalUsers = User::where('designation', '!=', '[INTRUDER_ROLE]')->get()->count();

        //Get Total Amount earned from service requests
        $totalAmountReceived = ServiceRequest::select('total_amount')->get();

        $totalAmount = 0;
        foreach($totalAmountReceived as $amount){ $totalAmount += $amount->total_amount; }

        $highestReturningJobs = ServiceRequest::select('user_id', 'job_reference', 'total_amount', 'created_at')->orderBy('total_amount', 'DESC')->limit(3)->get();

        // return $highestReturningJobs;

        $data = [
            'totalRequests'             =>  $totalRequests,
            'totalPendingRequests'      =>  $totalPendingRequests,
            'totalCancelledRequests'    =>  $totalCancelledRequests,
            'totalCompletedRequests'    =>  $totalCompletedRequests,
            'totalOngoingRequests'      =>  $totalOngoingRequests,
            'totalAdmins'               =>  $totalAdmins,
            'totalClients'              =>  $totalClients,
            'totalCses'                 =>  $totalCses,
            'totalTechnicians'          =>  $totalTechnicians,
            'totalUsers'                =>  $totalUsers,
            'totalAmount'               =>  $totalAmount,
            'highestReturningJobs'      =>  $highestReturningJobs
        ];
        
        return view('admin.home', $data)->with('i');
    }
}
