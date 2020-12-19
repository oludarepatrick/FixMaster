<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\ActivityLog;
use App\Models\User;

class ActivityLogController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){
        
        // $activityLogs = ActivityLog::orderBy('created_at', 'DESC')->paginate(20);
        $activityLogs = ActivityLog::orderBy('created_at', 'DESC')->get();

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

        $data = [
            'activityLogs'  =>  $activityLogs,
            'message'       =>  $message,
            'years'         =>  $years,
        ];

        // return view('admin.activity_log', $data)->with('i', (request()->input('page', 1) -1)*20);
        return view('admin.activity_log', $data)->with('i');
    }

    
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * This is an ajax call to sort all users Activity Log 
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

                $activityLogs = ActivityLog::where('type', $type)
                ->orderBy('created_at', 'DESC')->get();

                $message = 'Showing Activity Log of "'.$type.'"';

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin._activity_log_table', $data)->with('i');

            }

            if($level === 'Level Two'){

                if(($type !== 'None') && !empty($specificDate)){
                    $activityLogs = ActivityLog::where('type', $type)
                    ->whereDate('created_at', $specificDate)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log of "'.$type.'" activity type for '.\Carbon\Carbon::parse($specificDate, 'UTC')->isoFormat('LL');
                }
                
                if(($type == 'None') && !empty($specificDate)){
                    $activityLogs = ActivityLog::whereDate('created_at', $specificDate)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log for '.\Carbon\Carbon::parse($specificDate, 'UTC')->isoFormat('LL');
                }

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin.users.admin._activity_log_table', $data)->with('i');

            }

            if($level === 'Level Three'){
                if(($type !== 'None') && !empty($specificYear)){
                    $activityLogs = ActivityLog::where('type', $type)
                    ->whereYear('created_at', $specificYear)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log of "'.$type.'" activity type for year '.$specificYear;
                }
                
                if(($type == 'None') && !empty($specificYear)){
                    $activityLogs = ActivityLog::whereYear('created_at', $specificYear)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log for year '.$specificYear;
                }

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin.users.admin._activity_log_table', $data)->with('i');
            }

            if($level === 'Level Four'){
                
                if(($type !== 'None') && !empty($specificYear) && !empty($specificMonth)){
                    $activityLogs = ActivityLog::where('type', $type)
                    ->whereYear('created_at', $specificYear)
                    ->whereMonth('created_at', $specificMonth)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log of "'.$type.'" activity type for "'.$specificMonthName.'" in year '.$specificYear;
                }
                
                if(($type == 'None') && !empty($specificYear) && !empty($specificMonth)){
                    $activityLogs = ActivityLog::whereYear('created_at', $specificYear)
                    ->whereMonth('created_at', $specificMonth)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log for "'.$specificMonthName.'" in year '.$specificYear;
                }

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin.users.admin._activity_log_table', $data)->with('i');
            }
            
            if($level === 'Level Five'){

                if(($type !== 'None') && !empty($dateFrom) && !empty($dateTo)){
                    $activityLogs = ActivityLog::where('type', $type)
                    ->whereBetween('created_at', [$dateFrom, $dateTo])
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log of "'.$type.'" activity type from "'.\Carbon\Carbon::parse($dateFrom, 'UTC')->isoFormat('LL').'" to "'.\Carbon\Carbon::parse($dateTo, 'UTC')->isoFormat('LL').'"';
                }
                
                if(($type == 'None') && !empty($dateFrom) && !empty($dateTo)){
                    $activityLogs = ActivityLog::whereBetween('created_at', [$dateFrom, $dateTo])
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Activity Log from "'.\Carbon\Carbon::parse($dateFrom, 'UTC')->isoFormat('LL').'" to "'.\Carbon\Carbon::parse($dateTo, 'UTC')->isoFormat('LL').'"';
                }

                $data = [
                    'activityLogs'  =>  $activityLogs,
                    'message'       =>  $message,
                ];

                return view('admin.users.admin._activity_log_table', $data)->with('i');
            }

        }
    }

    public function activityLogDetails($id){

        ActivityLog::findOrFail($id);

        $activityLogDetails = ActivityLog::where('id', $id)->first();

        $user = User::where('id', $activityLogDetails->user_id)->first();

        $fullName = $user->fullName->name;

        if($user->designation == '[SUPER_ADMIN_ROLE]'){
            $designation = 'Super Admin';
        }elseif($user->designation == '[ADMIN_ROLE]'){
            $designation = 'Admin';
        }elseif($user->designation == '[CSE_ROLE]'){
            $designation = 'CSE';
        }elseif($user->designation == '[TECHNICIAN_ROLE]'){
            $designation = 'Technician';
        }elseif($user->designation == '[CLIENT_ROLE]'){
            $designation = 'Client';
        }elseif($user->designation == '[SUPPLIER_ROLE]'){
            $designation = 'Supplier';
        }elseif($user->designation == '[TRAINEE_ROLE]'){
            $designation = 'Trainee';
        }else{
            $designation = 'Intruder';
        } 

        $data = [
            'activityLogDetails'    =>  $activityLogDetails,
            'fullName'              =>  $fullName,
            'designation'           =>  $designation,
        ];

        return view('admin._activity_log_details', $data);
    }
}
