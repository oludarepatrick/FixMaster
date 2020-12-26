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
use App\Models\ServiceRequestProgress;
use App\Models\ServiceRequestStatus;
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

        //Assigning variables for Message and Email
        $cseId = $request->input('cse_id');
        $cseName = $request->input('cse_name');
        $cseEmail = $request->input('cse_email');

        $technicianId = $request->input('technician_id');
        $technicianName = $request->input('technician_name');
        $technicianEmail = $request->input('technician_email');

        $jobReference = $requestExists->job_reference;

        //service_request_status_id = Pending(1), Ongoing(4), Completed(3), Cancelled(2) 
        $assignCSETechnician = ServiceRequest::where('id', $id)->update([
            'admin_id'      =>  Auth::id(),
            'cse_id'        =>  $cseId,
            'technician_id' =>  $technicianId,
            'service_request_status_id' =>  '4',
        ]);

        //Create record in `service_request_progress` table
        $recordServiceProgress = ServiceRequestProgress::create([
            'user_id'                       =>  Auth::id(), 
            'service_request_id'            =>  $id, 
            'service_request_status_id'     =>  '4',
        ]);

        if($assignCSETechnician AND $recordServiceProgress){

            //Notify CSE and Technician with messages
            $this->assignMessage = new EssentialsController();
            $this->assignMessage->assignCseMessage($cseName, $cseId, $jobReference);
            $this->assignMessage->assignTechnicianMessage($technicianName, $technicianId, $cseName, $jobReference);

            /*
            * Code to send email goes here...
            */

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Request';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' assigned '.$cseName.'(CSE) and '.$technicianName.'  to '.$jobReference.' job';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.requests_ongoing')->with('success', $cseName.'(CSE) and '.$technicianName.' was assigned  to '.$jobReference.' job.');

        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to assign '.$cseName.'(CSE) and '.$technicianName.' to '.$jobReference.' job';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to assign CSE and Technician to '.$jobReference);
        }

        return back()->withInput();

    }

    public function ongoingRequests(){

        $serviceRequests = ServiceRequest::OngoingRequests()->get();

        // return $serviceRequests;

        $createdBy = Name::get();

        $data = [
            'serviceRequests'   =>  $serviceRequests,
            'createdBy'         =>  $createdBy,
        ];

        return view('admin.requests.requests_ongoing', $data)->with('i');
    }

    public function ongoingRequestDetails($id){

        $requestDetail = ServiceRequest::findOrFail($id);

        $serviceRequestProgreses =  $requestDetail->serviceRequestProgreses;

        $serviceRequestStatuses = ServiceRequestStatus::RequestUpdateStatuses()->get();

        // return $serviceRequestStatuses;
        $data = [
            'requestDetail' =>  $requestDetail,
            'serviceRequestProgreses'   =>  $serviceRequestProgreses,
            'serviceRequestStatuses'    =>  $serviceRequestStatuses,
        ];

        return view('admin.requests.request_ongoing_details', $data)->with('i');
    }

    public function markRequestAsCompleted($id){

        $requestExists = ServiceRequest::findOrFail($id);

        return $requestExists;

        //service_request_status_id = Pending(1), Ongoing(4), Completed(3), Cancelled(2) 
        $markAsCompleted = ServiceRequest::where('id', $id)->update([
            'admin_id'      =>  Auth::id(),
            'cse_id'        =>  $cseId,
            'technician_id' =>  $technicianId,
            'service_request_status_id' =>  '3',
        ]);

        //Create record in `service_request_progress` table
        $recordServiceProgress = ServiceRequestProgress::create([
            'user_id'                       =>  Auth::id(), 
            'service_request_id'            =>  $id, 
            'service_request_status_id'     =>  '4',
        ]);

        if($markAsCompleted AND $recordServiceProgress){

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Request';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' marked '.$jobReference.' as completed';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.requests_completed')->with('success', $jobReference.' has been marked as completed.');

        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to to mark '.$jobReference.' as completed';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to mark '.$jobReference.' as completed.');
        }

        return back()->withInput();

    }
}
