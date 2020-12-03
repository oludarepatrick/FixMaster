<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\Name;
use App\Models\ActivityLog;

use App\Http\Controllers\ActivityLogController;
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

        $admins = User::select('id', 'created_at', 'email', 'is_active', 'is_deleted')
        ->with(['admins' => function($query){
            return $query->select('created_by', 'designation', 'phone_number', 'user_id');
        }])
        ->with(['fullName' => function($name){
            return $name->select(['name', 'user_id']);
        }])
        ->where('users.designation', '[ADMIN_ROLE]')
        ->where('users.is_deleted', '0')
        ->orderBy('users.is_active', 'DESC')
        ->latest('users.created_at')
        ->get();

        // return $admins;

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
            $this->message = new ActivityLogController();
            $message = Auth::user()->fullName->name.' created '.$request->input('first_name').' '.$request->input('last_name').'\'s profile at '.\Carbon\Carbon::parse(now() , 'UTC')->isoFormat('LL h:mm:ssa');
            $this->message->createMessage($message, $type='Others');

            return back()->with('success', 'Admin profile was successfully created.');

        }else{
            return back()->with('error', 'An error occurred while trying to create Admin Profile.');
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
        
        $activityLogs = $userExists->activityLogs()->orderBy('created_at', 'DESC')->get();

        $fullName = $userExists->fullName->name;

        $data = [
            'activityLogs'  =>  $activityLogs,
            'fullName'      =>  $fullName,
            'userId'        =>  $user,
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
        // return $request;

        //Validate user input fields
        $this->validateUpdateRequest($id);

        $designation = $request->input('designation');

        //Update User record on `users` table
        $updateUserRecord = User::where('id', $id)->update([
            'email'             =>   $request->input('email'),
        ]);

        //Update User record on `admins` table
        $updateAdminRecord = Admin::where('user_id', $id)->update([
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

        if($updateUserRecord AND $updateAdminRecord AND $updateNameRecord){
            //Record crurrenlty logged in user activity
            $this->message = new ActivityLogController();
            $message = Auth::user()->fullName->name.' updated '.$request->input('first_name').' '.$request->input('last_name').'\s profile at '.\Carbon\Carbon::parse(now() , 'UTC')->isoFormat('LL h:mm:ssa');
            $this->message->createMessage($message, $type='Others');

            return redirect()->route('admin.list_admin')->with('success', $request->input('first_name').' '.$request->input('last_name').'\'s profile was successfully updated.');

        }else{
            return back()->with('error', 'An error occurred while trying to update Admin Profile.');
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

        $softDeleteUser = User::where('id', $user)->update([
            'is_deleted'    => '1',
        ]);

        if($softDeleteUser){
            //Record crurrenlty logged in user activity
            $this->message = new ActivityLogController();
            $message = Auth::user()->fullName->name.' deleted '.User::find($user)->fullName->name.'\'s profile at '.\Carbon\Carbon::parse(now() , 'UTC')->isoFormat('LL h:mm:ssa');
            $this->message->createMessage($message, $type='Others');
            
            return redirect()->route('admin.list_admin')->with('success', 'Admin Profile has been deleted.');
            
        }else{
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
            $this->message = new ActivityLogController();
            $message = Auth::user()->fullName->name.' deactivated '.User::find($user)->fullName->name.'\'s profile at '.\Carbon\Carbon::parse(now() , 'UTC')->isoFormat('LL h:mm:ssa');
            $this->message->createMessage($message, $type='Others');

            return redirect()->route('admin.list_admin')->with('success', 'Admin Profile has been deactivated.');
            
        }else{
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
            $this->message = new ActivityLogController();
            $message = Auth::user()->fullName->name.' reinstated '.User::find($user)->fullName->name.'\'s profile at '.\Carbon\Carbon::parse(now() , 'UTC')->isoFormat('LL h:mm:ssa');
            $this->message->createMessage($message, $type='Others');

            return redirect()->route('admin.list_admin')->with('success', 'Admin has been reinstated.');
            
        }else{
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
            //Verify if user exists on `users` table
            $userExists = User::findOrFail($userId);
        
            if($level === 'Level One'){

                $activityLogs = $userExists->activityLogs()
                ->where('type', $type)
                ->orderBy('created_at', 'DESC')->get();

                $data = [
                    'activityLogs'  =>  $activityLogs,
                ];

                return view('admin.users.admin._activity_log_table', $data)->with('i');

            }

            if($level === 'Level Two'){

                if(!empty($type) && !empty($specificDate)){
                    $activityLogs = $userExists->activityLogs()
                    ->where('type', $type)
                    ->whereDate('created_at', $specificDate)
                    ->orderBy('created_at', 'DESC')->get();
                }
                
                if(!empty($specificDate)){
                    $activityLogs = $userExists->activityLogs()
                    ->whereDate('created_at', $specificDate)
                    ->orderBy('created_at', 'DESC')->get();
                }

                $data = [
                    'activityLogs'  =>  $activityLogs,
                ];

                return view('admin.users.admin._activity_log_table', $data)->with('i');

            }

            if($level === 'Level Three'){
                if(!empty($type) && !empty($specificYear)){
                    $activityLogs = $userExists->activityLogs()
                    ->where('type', $type)
                    ->whereYear('created_at', $specificYear)
                    ->orderBy('created_at', 'DESC')->get();
                }
                
                // if(!empty($specificYear) && ){
                //     $activityLogs = $userExists->activityLogs()
                //     ->whereYear('created_at', $specificYear)
                //     ->orderBy('created_at', 'DESC')->get();
                // }

                // return $activityLogs;

                $data = [
                    'activityLogs'  =>  $activityLogs,
                ];

                return view('admin.users.admin._activity_log_table', $data)->with('i');
            }
            

        }
    }
}
