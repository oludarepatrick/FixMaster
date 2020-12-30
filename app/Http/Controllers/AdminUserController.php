<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL; 
use Route;
use Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\Name;
use App\Models\ActivityLog;

use App\Http\Controllers\RecordActivityLogController;
use App\Http\Controllers\AdminPermissionController;


class AdminUserController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $admins = User::select('id', 'created_at', 'email', 'is_active')
        ->with(['admins' => function($query){
            return $query->select('created_by', 'designation', 'phone_number', 'user_id');
        }])
        ->with(['fullName' => function($name){
            return $name->select(['name', 'user_id']);
        }])
        ->where('users.designation', '[ADMIN_ROLE]')
        // ->withTrashed()
        ->orderBy('users.is_active', 'DESC')
        ->latest('users.created_at')
        ->get();

        $createdBy = Name::get();

        $data = [
            'admins'    =>  $admins,
            'createdBy' =>  $createdBy,
        ];

        return view('admin.users.admin.list', $data)->with('i');
    }

    public function create(){
        return view('admin.users.admin.add');
    }

    public function store(Request $request){

        //Validate user input fields
        $this->validateRequest();

        $designation = $request->input('designation');

        //Create new User record on `users` table
        $createUserRecord = User::create([
            'email'                         =>   $request->input('email'),
            'email_verified_at'             =>   \Carbon\Carbon::now(),
            'email_verification_token'      =>   sha1(time()),
            'is_email_verified'             =>   '1',
            'password'                      =>   Hash::make($request->input('password')),
            'designation'                   =>   '[ADMIN_ROLE]',
            'is_active'                     =>   '1',
            'is_admin'                      =>   '1',
        ]);

        //Create new User record on `admins` table
        $createAdminRecord = Admin::create([
            'user_id'           =>  $createUserRecord->id,
            'created_by'        =>  Auth::id(),
            'first_name'        =>  $request->input('first_name'),
            'middle_name'       =>  $request->input('middle_name'),
            'last_name'         =>  $request->input('last_name'),
            'phone_number'      =>  $request->input('phone_number'),
            'designation'       =>  $designation,
        ]);

        //Create new User record on `admin_permissions` table
        $this->permission = new AdminPermissionController();

        if($designation === 'ADMIN_ROLE'){
            $this->permission->adminRole($request, $createUserRecord->id);
        }else{
            $this->permission->superAdminRole($createUserRecord->id);
        }

        //Create new User record on `names` table
        $createNameRecord = Name::create([
            'user_id'           =>  $createUserRecord->id,
            'name'              =>  $request->input('first_name').' '.$request->input('last_name'),
        ]);

        if($createUserRecord AND $createAdminRecord AND $createNameRecord){
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' created '.$request->input('first_name').' '.$request->input('last_name').'\'s profile';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('success', $request->input('first_name').' '.$request->input('last_name').' profile was successfully created.');

        }else{

            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to create '.$request->input('first_name').' '.$request->input('last_name').'\'s Profile.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to create '.$request->input('first_name').' '.$request->input('last_name').' Profile.');
        }

        return back()->withInput();

    }

    /**
     * Validate user input fields
     */
    private function validateRequest(){
        return request()->validate([
            'first_name'                =>   'required',
            'middle_name'               =>   '',
            'last_name'                 =>   'required',
            'email'                     =>   'required|email|unique:users,email', 
            'phone_number'              =>   'required|Numeric|unique:admins,phone_number', 
            'designation'               =>   'required',
            'password'                  =>   'required|min:8',
            'confirm_password'          =>   'required|same:password', 
        ]);
    }

    public function show($user){
        $userExists = User::findOrFail($user);

        if($userExists->designation != '[ADMIN_ROLE]'){
            return back();
        }

        $admin = User::where('id', $user)->with('admins')->first();
        
        $createdBy = Name::get();

        $data = [
            'admin' =>  $admin,
            'createdBy' =>  $createdBy,
        ];

        return view('admin.users.admin.summary', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $userExists = User::findOrFail($user);

        if($userExists->designation != '[ADMIN_ROLE]'){
            return back();
        }
        
        if($userExists->designation != '[ADMIN_ROLE]'){
            return back();
        }

        $admin = User::ActiveAdmin($user)->first();

        $data = [
            'admin' =>  $admin
        ];

        return view('admin.users.admin.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activityLog($user)
    {
        $userExists = User::findOrFail($user);
        
        if($userExists->designation != '[ADMIN_ROLE]'){
            return back();
        }
        
        $activityLogs = $userExists->activityLogs()->orderBy('created_at', 'DESC')->get();

        $fullName = $userExists->fullName->name;

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
            'fullName'      =>  $fullName,
            'userId'        =>  $user,
            'message'       =>  $message,
            'years'         =>  $years,
        ];

        return view('admin.users.admin.activity_log', $data)->with('i');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userExists = User::findOrFail($id);

        //Validate user input fields
        $this->validateUpdateRequest($id);

        $designation = $request->input('designation');

        //Update User record on `users` table
        $updateUserRecord = User::where('id', $id)->update([
            'email'             =>   $request->input('email'),
        ]);

        //Update User record on `admins` table
        $updateAdminRecord = Admin::where('user_id', '=', $id)->update([
            'first_name'        =>  $request->input('first_name'),
            'middle_name'       =>  $request->input('middle_name'),
            'last_name'         =>  $request->input('last_name'),
            'phone_number'      =>  $request->input('phone_number'),
            'designation'       =>  $designation,
        ]);

        //Update User record on `admin_permissions` table
        $this->permission = new AdminPermissionController();

        if($designation === 'ADMIN_ROLE'){
            $this->permission->updateAdminRole($request, $id);
        }else{
            $this->permission->updateSuperAdminRole($id);
        }

        //Update User record on `names` table
        $updateNameRecord = Name::where('user_id', $id)->update([
            'name'              =>  $request->input('first_name').' '.$request->input('last_name'),
        ]);

        if($updateUserRecord && $updateNameRecord ){

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' updated '.$request->input('first_name').' '.$request->input('last_name').'\'s profile';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.list_admin')->with('success', $request->input('first_name').' '.$request->input('last_name').'\'s profile was successfully updated.');

        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to update '.$request->input('first_name').' '.$request->input('last_name').'\'s Profile.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to update '.$request->input('first_name').' '.$request->input('last_name').' Profile.');
        }

        return back()->withInput();

    }

    /**
     * Validate user input fields
     */
    private function validateUpdateRequest($id){
        return request()->validate([
            'first_name'                =>   'required',
            'middle_name'               =>   '',
            'last_name'                 =>   'required',
            'email'                     =>   'required|email|unique:users,email,'.$id.',id', 
            'phone_number'              =>   'required|Numeric|unique:admins,phone_number,'.$id.',user_id', 
            'designation'               =>   'required',
        ]);
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
            
            return redirect()->route('admin.list_admin')->with('success', 'Admin Profile has been deleted.');
            
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

            return back()->with('error', 'An error occurred while trying to delete Admin Profile.');
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

            return redirect()->route('admin.list_admin')->with('success', 'Admin Profile has been deactivated.');
            
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

            return back()->with('error', 'An error occurred while trying to deactivate Admin Profile.');
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

            return redirect()->route('admin.list_admin')->with('success', 'Admin has been reinstated.');
            
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

            return back()->with('error', 'An error occurred while trying to reinstate Admin Profile.');
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

                return view('admin.users.admin._activity_log_table', $data)->with('i');

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

                return view('admin.users.admin._activity_log_table', $data)->with('i');

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

                return view('admin.users.admin._activity_log_table', $data)->with('i');
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

                return view('admin.users.admin._activity_log_table', $data)->with('i');
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

                return view('admin.users.admin._activity_log_table', $data)->with('i');
            }

        }
    }
}
