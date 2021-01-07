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
use App\Models\ReceivedPayment;
use App\Models\DisbursedPayment;

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
        $totalAmountReceived = ServiceRequest::select('total_amount')->where('service_request_status_id', '!=', 2)->get();

        $cancelledAmountReceived = ServiceRequest::select('total_amount')->where('service_request_status_id', '=', 2)->get();

        $disbursedPayments = DisbursedPayment::select('amount')->orderBy('created_at', 'DESC')->get();

        
        $totalAmount = 0;
        foreach($totalAmountReceived as $amount){ $totalAmount += $amount->total_amount; }

        $cancelledTotalAmount = 0;
        foreach($cancelledAmountReceived as $amount){ $cancelledTotalAmount += $amount->total_amount; }

        $disbursedTotalAmount = 0;
        foreach($disbursedPayments as $amount){ $disbursedTotalAmount += $amount->amount; }

        $profitLossAmount = $totalAmount - ($cancelledTotalAmount + $disbursedTotalAmount);

        $highestReturningJobs = ServiceRequest::select('user_id', 'job_reference', 'total_amount', 'created_at')->orderBy('total_amount', 'DESC')->limit(3)->get();

        $receivedPayments = ReceivedPayment::limit(5)->get();

        $cses = User::ActiveCses()->with('cseRequests')->limit(5)->get()->sortBy(function($cse)
        {
            return $cse->cseRequests()->where('service_request_status_id', '=', 3)->count();
        })->reverse();


        // return $cses;

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
            'highestReturningJobs'      =>  $highestReturningJobs,
            'receivedPayments'          =>  $receivedPayments,
            'cses'                      =>  $cses,
            'cancelledTotalAmount'      =>  $cancelledTotalAmount,
            'disbursedTotalAmount'      =>  $disbursedTotalAmount,
            'profitLossAmount'          =>  $profitLossAmount,
        ];
        
        return view('admin.home', $data)->with('i');
    }
}
