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
use App\Models\ToolsInventory;
use App\Models\RFQ;
use App\Models\RFQBatch;
use App\Models\RFQSupplier;
use App\Models\ToolsRequest;
use App\Models\ToolsRequestBatch;


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

        if(Auth::user()->designation != '[ADMIN_ROLE]'){
            return back()->with('error', 'Sorry! Only FixMaster Administrators can assign CSE and Technicians.');
        }

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

        $clientId = $requestExists->user_id;
        $clientName = $requestExists->user->fullName->name;
        $securityCode = $requestExists->security_code;

        // return [
        //     $clientId, $clientName, $securityCode
        // ];

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
            $this->assignMessage->notifyClientOfCSETechnicianAssigning($clientName, $clientId, $securityCode, $jobReference);

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

        $tools = ToolsInventory::AvalaibleTools()->get();

        // return $requestDetail->rfq->rfqBatches;
        $data = [
            'requestDetail'             =>  $requestDetail,
            'serviceRequestProgreses'   =>  $serviceRequestProgreses,
            'serviceRequestStatuses'    =>  $serviceRequestStatuses,
            'tools'                     =>  $tools,
        ];

        return view('admin.requests.request_ongoing_details', $data)->with('i');
    }

    public function updateOngoingProgress(Request $request){

        //Validate user input fields
        // $this->validateUpdateOngoingRequest();

        $clientId = $request->input('client_id');
        $serviceRequestId = $request->input('service_request_id');
        $serviceRequestStatusId = $request->input('service_request_status_id');

        $serviceRequestExists = ServiceRequest::findOrFail($serviceRequestId);

        // return $serviceRequestExists->job_reference;

        //Update record on `service_requests` table
        $updateServiceRequest = ServiceRequest::where('id', $serviceRequestId)->update([
            'service_request_status_id' =>  $serviceRequestStatusId,
        ]);

         //Update Amount if RFQ was initially initiated
         if(!empty($request->input('rfq_id'))){

            //Validate input fields for RFQ update
            $request->validate([
                'name'              =>  'required',
                'devlivery_fee'     =>  'required',
                'delivery_time'     =>  'required',
                'amount'            =>  'required',
            ]);
            
            // return $request->amount;            
            $rfId =  $request->input('rfq_id');
            $totalAmount = 0;

            RFQSupplier::create([
                'rfq_id'            =>  $rfId, 
                'name'              =>  $request->input('name'), 
                'devlivery_fee'     =>  $request->input('devlivery_fee'), 
                'delivery_time'     =>  \Carbon\Carbon::parse($request->input('delivery_time'), 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa'),
            ]);
            
            //Update amount for each entry on `rfq_batches` table for a RFQ Batch record
            foreach ($request->amount as $item => $value){
                RFQBatch::where('rfq_id', $rfId)->update([
                    'amount'    =>  $request->amount[$item],
                ]);

                $totalAmount += ($request->amount[$item] * $request->quantity[$item]);
            }

            //Update total_amount for RFQ in `rfqs` table
            RFQ::where('id', $rfId)->update([
                'total_amount'  =>  $totalAmount,
                'invoice_number'    =>  'INV-'.strtoupper(substr(md5(time()), 0, 8)),
                'status'            =>  '1', //Status is set to `Awaiting Client's paymemt`
            ]);

        }

        //Create record only if RFQ was initiated
        if($request->input('intiate_rfq') == 'yes'){

            //Validate input fields for RFQ
            $request->validate([
                'component_name'    =>  'required',
                'model_number'      =>  '',
                'quantity'          =>  'required',
            ]);
            
            //Create RFQ Batch record on `rfqs` table
            $createRFQ = RFQ::create([
                'issued_by'             =>  Auth::id(),
                'service_request_id'    =>  $serviceRequestId,
                'client_id'             =>  $clientId,
                'batch_number'          =>  'RFQ-'.strtoupper(substr(md5(time()), 0, 8)),
                'updated_at'            =>  null,
            ]);

            //Create entries on `rfq_batches` table for a single RFQ Batch record
            foreach ($request->component_name as $item => $value){
                RFQBatch::create([
                    'rfq_id'            =>  $createRFQ->id,
                    'component_name'    =>  $request->component_name[$item], 
                    'model_number'      =>  $request->model_number[$item], 
                    'quantity'          =>  $request->quantity[$item],
                ]);
            }
        }

        //Create record only if Tools were requested
        if($request->input('intiate_trf') == 'yes'){

            //Validate input fields for Tools request
            $request->validate([
                'tool_id'           =>  'required',
                'tool_quantity'     =>  'required',
            ]);

            //Create Tools request Batch record on `tool_requests` table
            $createToolRequest = ToolsRequest::create([
                'requested_by'          =>  Auth::id(),
                'service_request_id'    =>  $serviceRequestId,
                'batch_number'          =>  'TRF-'.strtoupper(substr(md5(time()), 0, 8)),
                'updated_at'            =>  null,
            ]);

            //Create entries on `tool_request_batches` table for a single Tools request Batch record
            foreach ($request->tool_id as $item => $value){
                ToolsRequestBatch::create([
                    'tool_request_id'   =>  $createToolRequest->id,
                    'tool_id'           =>  $request->tool_id[$item], 
                    'quantity'          =>  $request->tool_quantity[$item],
                ]);
            }

        }

        if($updateServiceRequest){

            //Create record in `service_request_progress` table
            $recordServiceProgress = ServiceRequestProgress::create([
                'user_id'                       =>  Auth::id(), 
                'service_request_id'            =>  $serviceRequestId, 
                'service_request_status_id'     =>  $serviceRequestStatusId,
            ]);

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Request';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' updated '.$serviceRequestExists->job_reference.' job.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.requests_ongoing')->with('success', $serviceRequestExists->job_reference.' job was successfully updated.');

        }else{

            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to update '.$serviceRequestExists->job_reference.' job.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to update '.$serviceRequestExists->job_reference.' job.');
        }

        return back()->withInput();

    }

    /**
     * Validate user input fields
     */
    private function validateUpdateOngoingRequest(){
        return request()->validate([
            'client_id'                 =>   'required',
            'service_request_id'        =>   '',
            'service_request_status_id' =>   'required',
            'intiate_rfq'               =>   'required', 
            'intiate_trf'               =>   'required', 
        ]);
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
