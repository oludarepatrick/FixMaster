<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\Name;

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
        ->orderBy('users.created_at', 'DESC')
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
            //Record crurrenlty looged in user activity
            $this->message = new ActivityLogController();
            $message = Auth::user()->fullName->name.' created '.$request->input('first_name').' '.$request->input('last_name').' profile at '.\Carbon\Carbon::parse(now() , 'UTC')->isoFormat('LL h:mm:ssa');
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
}
