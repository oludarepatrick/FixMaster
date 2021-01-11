<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Auth;
use Session;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL; 
use App\Models\ActivityLog;
use App\Models\Technician;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\RecordActivityLogController;
use Route;

class TechnicianProfileController extends Controller
{

    public function __construct() {
        $this->middleware('auth:web');
    }

    //call the profile page with credentials
    public function edit_profile(Request $request)
    {

        $user_data = User::where('id', Auth::id())
                    ->select('id', 'email')
                    ->with(['technician' => function($query){ 	 
                        return $query->select('first_name', 'middle_name', 'last_name', 'gender', 'phone_number', 'other_phone_number', 'avatar', 'account_number', 'bank_id', 'state_id', 'lga_id', 'user_id', 'town', 'full_address');
                    }])
                    ->first(); 

        $data = [
            'firstName'         =>  $user_data->technician->first_name,
            'middleName'        =>  $user_data->technician->middle_name,
            'lastName'          =>  $user_data->technician->last_name,
            'gender'            =>  $user_data->technician->gender,
            'email'             =>  $user_data->email,
            'phoneNumber'       =>  $user_data->technician->phone_number,
            'otherPhoneNumber'  =>  $user_data->technician->other_phone_number,
            'avatar'            =>  $user_data->technician->avatar,
            'accountNumber'     =>  $user_data->technician->account_number,
            'fullAddress'       =>  $user_data->technician->full_address, 
            'town'              =>  $user_data->technician->town,
            'bankName'          =>  $user_data->technician->bank->name,
            'title'             =>  'profile',
        ];
    	return view('technician.edit_profile',$data);
    }

    public function update_profile(Request $request)
    {
        $user_data = User::where('id', Auth::id())
        ->select('id', 'email')
        ->with(['technician' => function($query){ 	 
            return $query->select('first_name', 'middle_name', 'last_name', 'gender', 'phone_number', 'other_phone_number', 'avatar', 'account_number', 'bank_id', 'state_id', 'lga_id', 'user_id', 'town', 'full_address');
        }])
        ->first(); 
        $technician = Technician::where('user_id', $user_data->technician->user_id)->first();

        $img = $request->file('profile_avater');
        $allowedExts = array('jpg', 'png', 'PNG', 'jpeg');

        $validatedData = $request->validate([            
            'first_name'  => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name'   => 'required|max:255',
            'email'       => 'required|email|max:255',             
            'phone_number'   => 'required|max:255',
            'profile_avater' => [
                function ($attribute, $value, $fail) use ($request, $img, $allowedExts) {
                    if ($request->hasFile('profile_avater')) {
                        $ext = $img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
            'full_address'   => 'required|max:255',
            'gender'   => 'required',

          ]);
            //user table
          $user_data->email = $request->email; 
          $user_data->save();         

        // if there is user_id update
        if ($user_data->technician->user_id) {
            //cse table                         
            $technician->first_name = $request->first_name;
            $technician->middle_name = $request->middle_name;
            $technician->last_name = $request->last_name;     
            $technician->gender = $request->gender;      
            $technician->phone_number = $request->phone_number;
            $technician->other_phone_number = $request->other_phone_number;  
            if($request->hasFile('profile_avater')){
                @unlink('assets/cse-technician-images/'.$technician->profile_avater);
                $filename = uniqid() . '.' . $img->getClientOriginalExtension();
                $img->move('assets/cse-technician-images/', $filename);
                $technician->avatar = $filename;
            }                      
            $technician->full_address = $request->full_address;
            $technician->save();
        } 

        if($user_data){

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
        
        // Session::flash('success', 'Profile updated successfully!');
        // return redirect()->back();
    }

    public function payments(){

        $technician = User::findOrFail(Auth::id());

        $payments = $technician->cseTechnicianDisbursedPayments()->latest()->get();

        // return $payments;

        $data = [
            'technician'   =>  $technician,
            'payments'  =>  $payments,
        ];

        return view('cse.payments', $data)->with('i');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function view_profile(Request $request){
        $user_data = User::where('id', Auth::id())
            ->select('id', 'email')
            ->with(['technician' => function($query){ 	 
                return $query->select('first_name', 'middle_name', 'last_name', 'gender', 'phone_number', 'other_phone_number', 'avatar', 'account_number', 'bank_id', 'state_id', 'lga_id', 'user_id', 'town', 'full_address');
            }])
            ->first(); 

        $data = [
            'firstName'         =>  $user_data->technician->first_name,
            'middleName'        =>  $user_data->technician->middle_name,
            'lastName'          =>  $user_data->technician->last_name,
            'gender'            =>  $user_data->technician->gender,
            'email'             =>  $user_data->email,
            'phoneNumber'       =>  $user_data->technician->phone_number,
            'otherPhoneNumber'  =>  $user_data->technician->other_phone_number,
            'avatar'            =>  $user_data->technician->avatar,
            'accountNumber'     =>  $user_data->technician->account_number,
            'fullAddress'       =>  $user_data->technician->full_address, 
            'town'              =>  $user_data->technician->town,
            'bankName'          =>  $user_data->technician->bank->name,
            'stateName'         =>  $user_data->technician->state->name,
            'title'             =>  'profile',
        ];
    	return view('technician.view_profile', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
