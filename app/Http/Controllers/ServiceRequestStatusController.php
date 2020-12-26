<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;
use Auth;

use App\Models\User;
use App\Models\ServiceRequestStatus;
use App\Models\Name;
use App\Http\Controllers\RecordActivityLogController;


class ServiceRequestStatusController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $serviceRequestStatuses = ServiceRequestStatus::orderBy('created_at', 'DESC')->get();

        // return $serviceRequestStatuses;
        $data = [
            'serviceRequestStatuses'  =>  $serviceRequestStatuses,
        ];

        return view('admin.utilities.service_request_status', $data)->with('i');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'name'      => 'required|unique:services,name',
        ]);

        $createServiceRequestStatus = ServiceRequestStatus::create([
            'user_id'       =>  Auth::id(),
            'name'          =>  ucfirst($request->input('name')),
            'updated_at'    =>  null,
        ]);

        if($createServiceRequestStatus){
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' created "'.ucfirst($request->input('name')).'" Service Request Status';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('success', ucfirst($request->input('name')).' Service Request Status was successfully created.');
        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to create Service Request Status.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to create Service Request Status.');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $serviceStatusExists = ServiceRequestStatus::findOrFail($id);

        $softDeleteService = ServiceRequestStatus::where('id', $id)->delete();

        if($softDeleteService){
            
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' deleted '.$serviceStatusExists->name.' service request status.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.utility_service_request_status')->with('success', 'Service request status has been deleted.');
            
        }else{
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to delete '.$serviceStatusExists->name.' service request status.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to delete service request status.');
        } 
    }

    public function edit($id){

        $status = ServiceRequestStatus::findOrFail($id);

        $data = [
            'status'    =>  $status,
        ];

        return view('admin.utilities._service_request_status_edit', $data);
    }

    public function update(Request $request, $id){

        $request->validate([
            'name'      => 'required',
        ]);

        $serviceExists = ServiceRequestStatus::findOrFail($id);
        
        $oldName = $serviceExists->name;
        
        $newName = $request->get('name');
        
        $updateService = ServiceRequestStatus::where('id', $id)->update([
            'name'      =>  ucfirst($request->get('name')),
        ]);

        if($updateService){
        
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' renamed '.$oldName.' service request status to '.$serviceExists->name;
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.utility_service_request_status')->with('success', 'Service request status has been updated.');
            
        }else{

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to rename '. $oldName.' to service request status '.$serviceExists->name;
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to update service request status.');
        } 
    
    }
}
