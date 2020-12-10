<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;
use Auth;

use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use App\Models\Name;
use App\Http\Controllers\RecordActivityLogController;

class ServicesController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $services = Service::orderBy('name', 'ASC')->get();

        $createdBy = Name::get();

        $data = [
            'services'  =>  $services,
            'createdBy' =>  $createdBy,
        ];

        return view('admin.services.services', $data)->with('i');
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

        $createService = Service::create([
            'user_id'       =>  Auth::id(),
            'name'          =>  ucwords($request->input('name')),
            'updated_at'    =>  null,
        ]);

        if($createService){
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' created '.ucwords($request->input('name')).' Service';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('success', ucwords($request->input('name')).' Service was successfully created.');
        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to create Service.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to create Service.');
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
        $serviceExists = Service::findOrFail($id);

         foreach($serviceExists->categories as $category){
                echo $category->id.'<br>';
                Category::where('id', $category->id)->update([
                    'service_id'    => 1
                ]);
         }

        $softDeleteService = Service::where('id', $id)->delete();

        if($softDeleteService){
            
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' deleted '.$serviceExists->name.' service';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.services')->with('success', 'Service has been deleted and Categories assigned to it has been moved to Uncategorized.');
            
        }else{
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to delete '.$serviceExists->name.' service.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to delete service.');
        } 
    }

    public function edit($id){

        $serviceExists = Service::findOrFail($id);

        $serviceDetails = Service::select('id', 'name')->where('id', $id)
        ->first();

        $data = [
            'serviceDetails'    =>  $serviceDetails,
        ];

        return view('admin.services._service_edit', $data)->with('i');
    }

    public function update(Request $request){

        // $request->validate([
        //     'name'      => 'required',
        // ]);

        if($request->ajax()){

            $id = $request->get('id');
            $serviceExists = Service::findOrFail($id);
            $oldName = $serviceExists->name;
            $newName = $request->get('serviceName');
            // return $serviceExists;
            $updateService = Service::where('id', $id)->update([
                'name'      =>  ucwords($request->get('serviceName')),
            ]);

            if($updateService){
            
                //Record crurrenlty logged in user activity
                $this->addRecord = new RecordActivityLogController();
                $id = Auth::id();
                $type = 'Others';
                $severity = 'Informational';
                $actionUrl = Route::currentRouteAction();
                $controllerActionPath = URL::full();
                $message = Auth::user()->fullName->name.' renamed '.$oldName.' service to '.$serviceExists->name;
                $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);
    
                // return redirect()->route('admin.services')->with('success', 'Service has been updated.');
                // return redirect()->route('admin.services')->with('success', 'Service has been updated.');
            return 'success';
                
            }else{
    
                //Record crurrenlty logged in user activity
                $this->addRecord = new RecordActivityLogController();
                $id = Auth::id();
                $type = 'Errors';
                $severity = 'Error';
                $actionUrl = Route::currentRouteAction();
                $controllerActionPath = URL::full();
                $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to rename '. $oldName.' to service '.$serviceExists->name;
                $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);
    
                // return back()->with('error', 'An error occurred while trying to update service.');
                return 'failed';
            } 
    
        }

    }

    public function deactivate($id)
    {
        $serviceExists = Service::findOrFail($id);

        $deactivateService = Service::where('id', $id)->update([
            'is_active'    => '0',
        ]);

        if($deactivateService){
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' deactivated '.$serviceExists->name.' service';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.services')->with('success', 'Service has been deactivated.');
            
        }else{
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to deactivate '.$serviceExists->name.' service.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to deactivate service.');
        } 
    }

    public function reinstate($id)
    {
        $serviceExists = Service::findOrFail($id);

        $reinstateService = Service::where('id', $id)->update([
            'is_active'    => '1',
        ]);

        if($reinstateService){
            
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' reinstated '.$serviceExists->name.' service';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.services')->with('success', 'Service has been reinstated.');
            
        }else{

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to reinstate '.$serviceExists->name.' service.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to reinstate service.');
        } 
    }

    public function serviceDetails($id){

        Service::findOrFail($id);

        $serviceDetails = Service::where('id', $id)->first();

        $services = Service::ActiveServices()->get();

        $fullName = User::where('id', $serviceDetails->user_id)->first();

        $fullName = $fullName->fullName->name;

        $data = [
            'serviceDetails'    =>  $serviceDetails,
            'fullName'          =>  $fullName,
            'services'          =>  $services,
            'serviceId'         =>  $id,
        ];

        return view('admin.services._service_details', $data)->with('i');
    }

    public function serviceReassign($id){

        Service::findOrFail($id);

        $serviceDetails = Service::where('id', $id)
        ->first();

        $services = Service::ActiveServices()->get();

        $fullName = User::where('id', $serviceDetails->user_id)->first();

        $fullName = $fullName->fullName->name;

        $data = [
            'serviceDetails'    =>  $serviceDetails,
            'fullName'          =>  $fullName,
            'services'          =>  $services,
            'serviceId'         =>  $id,
        ];

        return view('admin.services._service_reassign', $data)->with('i');
    }

    public function serviceCategoryReassign(Request $request){

        $serviceId = $request->get('serviceId');
        $serviceName =  $request->get('serviceName');
        $categoryId =  $request->get('categoryId');
        $categoryName =  $request->get('categoryName');

        $updateService = Category::where('id', $categoryId)->update([
            'service_id'    =>  $serviceId
        ]);

        if($updateService){

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' reassigned '.$categoryName.'category to '.$serviceName.' service';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return 'success';
        }else{

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to reassign '.$categoryName.' category to '.$serviceName.' service';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return 'failed';
        }
    }
    
}
