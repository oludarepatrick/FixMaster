<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EssentialsController;
use App\Http\Controllers\RecordActivityLogController;
use Illuminate\Support\Facades\URL; 
use Route;
use Auth;
use App\Models\User;
use App\Models\ServiceRequest;
use App\Models\ServiceRequestDetail;
use App\Models\Category;
use App\Models\Service;
use App\Models\ToolsInventory;
use App\Models\ToolsRequest;
use App\Models\ToolsRequestBatch;

class ToolsRequestController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $toolRequests = ToolsRequest::orderBy('created_at', 'DESC')->get();

        $data = [
            'toolRequests'   =>  $toolRequests,
        ];

        return view('admin.tools.requests', $data)->with('i');
    }

    public function toolRequestDetails($id){

        $toolRequestDetails = ToolsRequest::findOrFail($id);

        $data = [
            'toolRequestDetails'    =>  $toolRequestDetails,
        ];

        return view('admin.tools._request_details', $data)->with('i');

    }

    public function approveRequest($id){

        $batchNumberExists = ToolsRequest::findOrFail($id);

        $requesterName = $batchNumberExists->requester->fullName->name; 
        $requesterId = $batchNumberExists->requested_by; 
        $jobReference = $batchNumberExists->serviceRequest->job_reference; 
        $batchNumber = $batchNumberExists->batch_number;

        $tools = $batchNumberExists->toolRequestBatches;

        $approveRequest = ToolsRequest::where('id', $id)->update([
            'approved_by'   =>  Auth::id(),
            'status'        =>  'Approved',
            'updated_at'    =>  null,
        ]);

        if($approveRequest){


            //Create entries on `tool_request_batches` table for a single Tools request Batch record
            foreach ($tools as $item => $value){

                //Reduce available quantity for a particulat tool on `tool_inventories`  table
                ToolsInventory::where('id', $value->tool_id)->decrement('available', $value->quantity);
            }

            //Send message to Requester for Tool request approval
            $this->approveToolRequest = new EssentialsController();
            $this->approveToolRequest->approveToolRequest($requesterName, $requesterId, $jobReference, $batchNumber);

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Request';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' approved Tools request with Bacth number: '.$batchNumberExists->batch_number.'.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.tools_request')->with('success', $batchNumberExists->batch_number.' Tools request was approved.');

        }else{

            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to approve Tools request with Bacth number: '.$batchNumberExists->batch_number.'.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to approve '.$batchNumberExists->batch_number.' Tool request.');
        }
       
    }

    public function declineRequest($id){

        $batchNumberExists = ToolsRequest::findOrFail($id);

        $requesterName = $batchNumberExists->requester->fullName->name; 
        $requesterId = $batchNumberExists->requested_by; 
        $jobReference = $batchNumberExists->serviceRequest->job_reference; 
        $batchNumber = $batchNumberExists->batch_number;

        $declineRequest = ToolsRequest::where('id', $id)->update([
            'approved_by'   =>  Auth::id(),
            'status'        =>  'Declined',
            'updated_at'    =>  null,
        ]);

        if($declineRequest){

            //Send message to Requester for Tool request approval
            $this->declineToolRequest = new EssentialsController();
            $this->declineToolRequest->declineToolRequest($requesterName, $requesterId, $jobReference, $batchNumber);

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Request';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' declined Tools request with Bacth number: '.$batchNumberExists->batch_number.'.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.tools_request')->with('success', $batchNumberExists->batch_number.' Tools request was declined.');

        }else{

            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to decline Tools request with Bacth number: '.$batchNumberExists->batch_number.'.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to decline '.$batchNumberExists->batch_number.' Tool request.');
        }
    }

    public function returnToolsRequested($id){

        $batchNumberExists = ToolsRequest::findOrFail($id);

        $batchNumber = $batchNumberExists->batch_number;

        $tools = $batchNumberExists->toolRequestBatches;

        $markedRequest = ToolsRequest::where('id', $id)->update([
            'is_returned'   =>  '1',
        ]);

        if($markedRequest){

            //Create entries on `tool_request_batches` table for a single Tools request Batch record
            foreach ($tools as $item => $value){

                //Reduce available quantity for a particulat tool on `tool_inventories`  table
                ToolsInventory::where('id', $value->tool_id)->increment('available', $value->quantity);
            }

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Request';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' marked Tools request with Bacth number: '.$batchNumberExists->batch_number.' as returned.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.tools_request')->with('success', $batchNumberExists->batch_number.' Tools request was marked as returned.');

        }else{

            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to mark Tools request with Bacth number: '.$batchNumberExists->batch_number.' as returned.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to mark '.$batchNumberExists->batch_number.' Tool request as returned.');
        }
    }

}
