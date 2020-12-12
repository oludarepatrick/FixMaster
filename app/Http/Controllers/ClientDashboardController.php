<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\URL; 
use Route;
use Image;

use App\Models\User;
use App\Models\Client;
use App\Models\Name;
use App\Models\ServiceRequest;
use App\Models\Profession;
use App\Models\State;

use App\Models\Service;
use App\Models\Category;
use App\Http\Controllers\RecordActivityLogController;

class ClientDashboardController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $client =  Client::where('user_id', Auth::id())->first();

        $user =  User::where('id', Auth::id())->first();

        $totalRequests = $user->requests()->count();

        //client_project_status 1 =>Pending, 2 =>Ongoing, 3 =>Completed, 4 =>Cancelled
        $completedRequests = ServiceRequest::where('client_project_status', '3')->get()->count();
        $cancelledRequests = ServiceRequest::where('client_project_status', '4')->get()->count();

        $data  = [
            'user'              =>  $user,
            'client'            =>  $client,
            'totalRequests'     =>  $totalRequests,
            'completedRequests' =>  $completedRequests,
            'cancelledRequests' =>  $cancelledRequests,
        ];

        return view('client.home', $data);
    }

    public function settings(){

        $client =  Client::where('user_id', Auth::id())->first();

        $user =  User::where('id', Auth::id())->first();

        $professions = Profession::select('id', 'name', 'description')->get();

        $states = State::select('id', 'name')->orderBy('name', 'ASC')->get();

        $data  = [
            'user'              =>  $user,
            'client'            =>  $client,
            'professions'       =>  $professions,
            'states'            =>  $states,
        ];

        return view('client.settings', $data);
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

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        // return $request;
        $id =  Auth::id();

        $userExists = User::findOrFail($id);
        
        //Validate user input fields
        $this->validateUpdateRequest($id);

        //Update User record on `users` table
        $updateUserRecord = User::where('id', $id)->update([
            'email'             =>   $request->input('email'),
        ]);

        //Update User record on `clients` table
        $updateClientRecord = Client::where('user_id', '=', $id)->update([
            'state_id'          =>  $request->input('state_id'),
            'lga_id'            =>  $request->input('lga_id'),
            'profession_id'     =>  $request->input('profession_id'),
            'first_name'        =>  $request->input('first_name'),
            'middle_name'       =>  $request->input('middle_name'),
            'last_name'         =>  $request->input('last_name'),
            'phone_number'      =>  $request->input('phone_number'),
            'town'              =>  $request->input('phone_number'),
        ]);

        //Update User record on `names` table
        $updateNameRecord = Name::where('user_id', $id)->update([
            'name'              =>  $request->input('first_name').' '.$request->input('last_name'),
        ]);

        if($updateUserRecord && $updateNameRecord ){

            $gender = Auth::user()->client->gender;
            if($gender == 'Male'){
                $gender = 'his';
            }else{
                $gender = 'her';
            }

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' updated '.$gender.' profile';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('client.home')->with('success', 'Profile was successfully updated.');

        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to update '.$gender.' profile.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to update your profile.');
        }

        return back()->withInput();

    }

    /**
     * Validate user input fields
     */
    private function validateUpdateRequest($id){
        return request()->validate([
            'state_id'                  =>   'required',
            'lga_id'                    =>   'required',
            'profession_id'             =>   '',
            'first_name'                =>   'required',
            'middle_name'               =>   '',
            'last_name'                 =>   'required',
            'email'                     =>   'required|email|unique:users,email,'.$id.',id', 
            'phone_number'              =>   'required|Numeric|unique:clients,phone_number,'.$id.',user_id', 
            'town'                      =>   'required',
        ]);
    }

    public function updateAvatar(Request $request){
        return $request;
    }
}
