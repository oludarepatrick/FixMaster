<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL; 
use App\Models\User;
use App\Models\Admin;
use App\Models\SuperAdmin;
use App\Models\AdminPermission;
use App\Models\Name;
use App\Models\ActivityLog;
use Route;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AdminPermissionController;

class AdminProfileController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function showProfile(){

        $designation = Auth::user()->designation;

        if($designation == '[SUPER_ADMIN_ROLE]')
        {
            $admin = User::where('id', Auth::id())
            ->select('id', 'email')
            ->with(['superAdmin' => function($query){
                return $query->select('first_name', 'middle_name', 'last_name', 'phone_number', 'user_id');
            }])
            ->first();

            $data = [
                'firstName'         =>  $admin->superAdmin->first_name,
                'middleName'        =>  $admin->superAdmin->middle_name,
                'lastName'          =>  $admin->superAdmin->last_name,
                'email'             =>  $admin->email,
                'phoneNumber'       =>  $admin->superAdmin->phone_number,
            ];
        }

        if($designation == '[ADMIN_ROLE]')
        {
            $admin = User::where('id', Auth::id())
            ->select('id', 'email')
            ->with(['admin' => function($query){
                return $query->select('first_name', 'middle_name', 'last_name', 'phone_number', 'user_id');
            }])->first();

            $data = [
                'firstName'         =>  $admin->admin->first_name,
                'middleName'        =>  $admin->admin->middle_name,
                'lastName'          =>  $admin->admin->last_name,
                'email'             =>  $admin->email,
                'phoneNumber'       =>  $admin->admin->phone_number,
            ];
        }

        return view('admin.edit_profile', $data);
    }

    public function updateProfile(Request $request){

        //Current logged in user id
        $id = Auth::id();

        //Validate user input fields
        $this->validateUpdateRequest($id);

        //Determine Admin designation
        $designation = Auth::user()->designation;;

        //Update User record on `users` table
        $updateUserRecord = User::where('id', $id)->update([
            'email'             =>   $request->input('email'),
        ]);

        if($designation === '[SUPER_ADMIN_ROLE]')
        {
            //Update User record on `super_admins` table
            $updateAdminRecord = SuperAdmin::where('user_id', $id)->update([
                'first_name'        =>  $request->input('first_name'),
                'middle_name'       =>  $request->input('middle_name'),
                'last_name'         =>  $request->input('last_name'),
                'phone_number'      =>  $request->input('phone_number'),
            ]);
        }

        if($designation === '[ADMIN_ROLE]')
        {
            //Update User record on `admins` table
            $updateAdminRecord = Admin::where('user_id', $id)->update([
                'first_name'        =>  $request->input('first_name'),
                'middle_name'       =>  $request->input('middle_name'),
                'last_name'         =>  $request->input('last_name'),
                'phone_number'      =>  $request->input('phone_number'),
            ]);
        }

        //Update User record on `names` table
        $updateNameRecord = Name::where('user_id', $id)->update([
            'name'              =>  $request->input('first_name').' '.$request->input('last_name'),
        ]);

        if($updateUserRecord && $updateNameRecord){

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' updated profile';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('success', 'Profile was successfully updated.');

        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to update profile.';

            return back()->with('error', 'An error occurred while trying to update Profile.');
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
        ]);
    }

    public function updatePassword(Request $request){

        $request->validate([
            'current_password'      => ['required', new MatchOldPassword],
            'new_password'          => ['required', 'min:8'],
            'new_confirm_password'  => ['same:new_password'],
        ]);
   
        $updatePassword = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        if($updatePassword){
            
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' changed profile password';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('success', 'Password was successfully changed.');
        }else{

            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to update profile password.';

            return back()->with('error','An error occurred while tyring to update your password. Try again!');
        }
    }

}
