<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;
use Auth;
use Image;

use App\Models\User;
use App\Models\Client;
use App\Models\Name;
use App\Models\ServiceRequest;

use App\Models\Service;
use App\Models\Category;
use App\Http\Controllers\RecordActivityLogController;

class AdminClientController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::ActiveClients()->get();

        $data = [
            'clients'  =>  $clients,
        ];

        return view('admin.users.client.list', $data)->with('i');
       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function summary($user){

        $clientExists = Client::findOrFail($user);

        $client =  Client::where('id', $user)->first();
        $user =  User::where('id', $client->user_id)->first();
        $totalRequests = $user->requests()->count();

        //client_project_status 1 =>Pending, 2 =>Ongoing, 3 =>Completed, 4 =>Cancelled
        $completedRequests = ServiceRequest::where('client_project_status', '3')->get()->count();
        $cancelledRequests = ServiceRequest::where('client_project_status', '4')->get()->count();

        $data = [
            'client'            =>  $client,
            'user'              =>  $user,
            'totalRequests'     =>  $totalRequests,
            'completedRequests' =>  $completedRequests,
            'cancelledRequests' =>  $cancelledRequests,
        ];

        return view('admin.users.client.summary', $data);
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($user)
    {
        $userExists = User::findOrFail($user);

        //Casted to SoftDelete
        $softDeleteUser = $userExists->delete();

        if($softDeleteUser){
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' deleted '.$userExists->fullName->name.'\'s profile';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);
            
            return redirect()->route('admin.list_client')->with('success', 'Client Profile has been deleted.');
            
        }else{

            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to delete '.$userExists->fullName->name.'\'s Profile.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to delete Client Profile.');
        } 
    }

    public function deactivate($user)
    {
        $userExists = User::findOrFail($user);

        $deactivateUser = User::where('id', $user)->update([
            'is_active'    => '0',
        ]);

        if($deactivateUser){
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' deactivated '.$userExists->fullName->name.'\'s profile';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.list_client')->with('success', 'Client Profile has been deactivated.');
            
        }else{
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to deactivate '.$userExists->fullName->name.'\'s Profile.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to deactivate Client Profile.');
        } 
    }

    public function reinstate($user)
    {
        $userExists = User::findOrFail($user);

        $reinstateUser = User::where('id', $user)->update([
            'is_active'    => '1',
        ]);

        if($reinstateUser){
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' reinstated '.$userExists->fullName->name.'\'s profile';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.list_client')->with('success', 'Client has been reinstated.');
            
        }else{
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to reinstate '.$userExists->fullName->name.'\'s Profile.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to reinstate Client Profile.');
        } 
    }
}
