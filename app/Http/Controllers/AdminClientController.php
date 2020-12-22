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
use App\Models\ActivityLog;

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

        $client = Client::findOrFail($user);

        $user =  User::where('id', $client->user_id)->first();

        $userId = $user->id;

        if($user->designation != '[CLIENT_ROLE]'){
            return back();
        }

        $activityLogs = $user->activityLogs()->orderBy('created_at', 'DESC')->get();

        $message = '';

        $yearList = array();

        $years = ActivityLog::orderBy('created_at', 'ASC')->pluck('created_at');

        $years = json_decode($years);

        if(!empty($years)){
            foreach($years as $year){
                $date = new \DateTime($year);

                $yearNumber = $date->format('y');

                $yearName = $date->format('Y');
                
                array_push($yearList, $yearName);
            }
        }

        $years = array_unique($yearList);

        //client_project_status = Pending, Ongoing, Completed, Cancelled 
        $completedRequests = ServiceRequest::where('client_project_status', 'Completed')->get()->count();
        $cancelledRequests = ServiceRequest::where('client_project_status', 'Cancelled')->get()->count();
        $totalRequests = $user->requests()->count();

        $data = [
            'client'            =>  $client,
            'user'              =>  $user,
            'totalRequests'     =>  $totalRequests,
            'completedRequests' =>  $completedRequests,
            'cancelledRequests' =>  $cancelledRequests,
            'activityLogs'      =>  $activityLogs,
            'userId'            =>  $userId,
            'message'           =>  $message,
            'years'             =>  $years,
            'totalFee'          =>  0,
        ];

        return view('admin.users.client.summary', $data)->with('i');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($user)
    {
        $client = Client::findOrFail($user);

        $userExists =  User::where('id', $client->user_id)->first();

        // $userExists = User::findOrFail($user);

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
        $client = Client::findOrFail($user);

        $userExists =  User::where('id', $client->user_id)->first();

        // $userExists = User::findOrFail($user);

        $deactivateUser = User::where('id', $userExists->id)->update([
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
        $client = Client::findOrFail($user);

        $userExists =  User::where('id', $client->user_id)->first();

        // $userExists = User::findOrFail($user);

        $reinstateUser = User::where('id', $userExists->id)->update([
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * This is an ajax call to sort a users Activity Log 
     * present on change of Activity Type select dropdown
     */
    public function sortActivityLog(Request $request){
        if($request->ajax()){

            //Get User ID
            $userId = $request->get('user');
            //Get current activity sorting level
            $level =  $request->get('sort_level');
            //Get the activity sorting type
            $type =  $request->get('type');
            //Get activity log for a specific date
            $specificDate =  $request->get('date');
            //Get activity log for a specific year
            $specificYear =  $request->get('year');
            //Get activity log for a specific month
            $specificMonth =  date('m', strtotime($request->get('month')));
            //Get activity log for a specific month name
             $specificMonthName =  $request->get('month');
            //Get activity log for a date range
            $dateFrom =  $request->get('date_from');
            $dateTo =  $request->get('date_to');
            //Verify if user exists on `users` table
            $userExists = User::findOrFail($userId);
        
            if($level === 'Level One'){

                $activityLogs = $userExists->activityLogs()
                ->where('type', $type)
                ->orderBy('created_at', 'DESC')->get();

                $message = 'Showing Activity Log of "'.$type.'"';

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin.users.client._activity_log_table', $data)->with('i');

            }

            if($level === 'Level Two'){

                if(($type !== 'None') && !empty($specificDate)){
                    $activityLogs = $userExists->activityLogs()
                    ->where('type', $type)
                    ->whereDate('created_at', $specificDate)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log of "'.$type.'" activity type for '.\Carbon\Carbon::parse($specificDate, 'UTC')->isoFormat('LL');
                }
                
                if(($type == 'None') && !empty($specificDate)){
                    $activityLogs = $userExists->activityLogs()
                    ->whereDate('created_at', $specificDate)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log for '.\Carbon\Carbon::parse($specificDate, 'UTC')->isoFormat('LL');
                }

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin.users.client._activity_log_table', $data)->with('i');

            }

            if($level === 'Level Three'){
                if(($type !== 'None') && !empty($specificYear)){
                    $activityLogs = $userExists->activityLogs()
                    ->where('type', $type)
                    ->whereYear('created_at', $specificYear)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log of "'.$type.'" activity type for year '.$specificYear;
                }
                
                if(($type == 'None') && !empty($specificYear)){
                    $activityLogs = $userExists->activityLogs()
                    ->whereYear('created_at', $specificYear)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log for year '.$specificYear;
                }

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin.users.client._activity_log_table', $data)->with('i');
            }

            if($level === 'Level Four'){
                
                if(($type !== 'None') && !empty($specificYear) && !empty($specificMonth)){
                    $activityLogs = $userExists->activityLogs()
                    ->where('type', $type)
                    ->whereYear('created_at', $specificYear)
                    ->whereMonth('created_at', $specificMonth)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log of "'.$type.'" activity type for "'.$specificMonthName.'" in year '.$specificYear;
                }
                
                if(($type == 'None') && !empty($specificYear) && !empty($specificMonth)){
                    $activityLogs = $userExists->activityLogs()
                    ->whereYear('created_at', $specificYear)
                    ->whereMonth('created_at', $specificMonth)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log for "'.$specificMonthName.'" in year '.$specificYear;
                }

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin.users.client._activity_log_table', $data)->with('i');
            }
            
            if($level === 'Level Five'){

                if(($type !== 'None') && !empty($dateFrom) && !empty($dateTo)){
                    $activityLogs = $userExists->activityLogs()
                    ->where('type', $type)
                    ->whereBetween('created_at', [$dateFrom, $dateTo])
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log of "'.$type.'" activity type from "'.\Carbon\Carbon::parse($dateFrom, 'UTC')->isoFormat('LL').'" to "'.\Carbon\Carbon::parse($dateTo, 'UTC')->isoFormat('LL').'"';
                }
                
                if(($type == 'None') && !empty($dateFrom) && !empty($dateTo)){
                    $activityLogs = $userExists->activityLogs()
                    ->whereBetween('created_at', [$dateFrom, $dateTo])
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log from "'.\Carbon\Carbon::parse($dateFrom, 'UTC')->isoFormat('LL').'" to "'.\Carbon\Carbon::parse($dateTo, 'UTC')->isoFormat('LL').'"';
                }

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin.users.client._activity_log_table', $data)->with('i');
            }

        }
    }
}
