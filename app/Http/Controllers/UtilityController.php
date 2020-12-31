<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\RecordActivityLogController;
use Illuminate\Support\Facades\URL; 
use Illuminate\Support\Facades\Hash;

use Route;
use Auth;
use App\Models\User;

class UtilityController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $emails = User::select('email')->orderBy('email', 'ASC')->get();

        $data = [
            'emails'    =>  $emails,
        ];

        return view('admin.utilities.reset_password', $data);
    }

    public function resetPassword(Request $request){

        $request->validate([
            // 'current_password'      => ['required', new MatchOldPassword],
            'password'          => ['required', 'min:8'],
            'confirm_password'  => ['same:password'],
        ]);
   
        $updatePassword = User::where('email', $request->email)->update([
            'password'=> Hash::make($request->password)
        ]);

        if($updatePassword){

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' changed '.$request->email.' password.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.utility_reset_password')->with('success','Password was successfully changed.');
        }else{

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to change '.$request->email.' password.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while tyring to reset password.');
        }
    }
}
