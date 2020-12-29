<?php

namespace App\Http\Controllers\CSE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use App\Models\State;
use App\Models\Lga;
use App\Models\CSE;
use Illuminate\Validation\Rule;
use Auth;
use Session;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL; 
use App\Models\ActivityLog;
use App\Http\Controllers\ActivityLogController;
use Route;

class CSEProfileController extends Controller
{

    public function __construct() {
        $this->middleware('auth:web');
    }

    //call the profile page with credentials
    public function edit_profile(Request $request)
    {
        // $user_dat=\Auth::user();

        $user_data = User::where('id', Auth::id())
                    ->select('id', 'email')
                    ->with(['cse' => function($query){ 	 
                        return $query->select('first_name', 'middle_name', 'last_name', 'gender', 'phone_number', 'other_phone_number', 'avatar', 'account_number', 'bank_id', 'state_id', 'lga_id', 'user_id', 'town', 'full_address');
                    }])
                    ->first();        
        $state_data = State::where('id', $user_data->cse->state_id)
                        ->select('name')
                        ->first();
        $lga_data =   Lga::where('id', $user_data->cse->lga_id)
                        ->select('name')
                        ->first();

        $data = [
            'firstName'         =>  $user_data->cse->first_name,
            'middleName'        =>  $user_data->cse->middle_name,
            'lastName'          =>  $user_data->cse->last_name,
            'gender'            =>  $user_data->cse->gender,
            'email'             =>  $user_data->email,
            'phoneNumber'       =>  $user_data->cse->phone_number,
            'otherPhoneNumber'  =>  $user_data->cse->other_phone_number,
            'avatar'            =>  $user_data->cse->avatar,
            'accountNumber'     =>  $user_data->cse->account_number,
            'fullAddress'       =>  $user_data->cse->full_address, 
            'town'              =>  $user_data->cse->town,
            'bankName'          =>  $user_data->cse->bank->name,
            'stateName'         =>  $state_data->name,
            'allStates'         =>  State::all(),
            'allBanks'          =>  Bank::all(),
            'allLgas'           =>  Lga::all(),
            'title'             =>  'profile',
        ];
        // get the selected bank_id
        $bank_selected  = Bank::find($user_data->cse->bank->id);
        $state_selected = State::find($user_data->cse->state->id);
        $Lga_selected   = Lga::find($user_data->cse->lga->id);
        // echo '<pre>';
        // echo json_encode($user_data->cse);
        // echo '</pre>';

    	return view('cse.edit_profile', compact('bank_selected', 'state_selected', 'Lga_selected')+$data);
    }

    public function update_profile(Request $request)
    {
        $user_data = User::where('id', Auth::id())
        ->select('id', 'email')
        ->with(['cse' => function($query){ 	 
            return $query->select('first_name', 'middle_name', 'last_name', 'gender', 'phone_number', 'other_phone_number', 'avatar', 'account_number', 'bank_id', 'state_id', 'lga_id', 'user_id', 'town', 'full_address');
        }])
        ->first(); 
        $cse = CSE::where('user_id', $user_data->cse->user_id)->first();

        $img = $request->file('profile_avater');
        $allowedExts = array('jpg', 'png', 'jpeg');

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
            'bank_id'   => 'required|max:255',
            'account_number'   => 'required|max:255', 
            'state_id'   => 'required|max:255',
            'lga_id'   => 'required|max:255',
            'town'   => 'required|max:255', 
            'full_address'   => 'required|max:255',
            'gender'   => 'required',

          ]);
            //user table
          $user_data->email = $request->email; 
          $user_data->save();         

        // if there is user_id update
        if ($user_data->cse->user_id) {
            //cse table                         
            $cse->first_name = $request->first_name;
            $cse->middle_name = $request->middle_name;
            $cse->last_name = $request->last_name;     
            $cse->gender = $request->gender;      
            $cse->phone_number = $request->phone_number;
            $cse->other_phone_number = $request->other_phone_number;  
            if($request->hasFile('profile_avater')){
                @unlink('assets/cse-technician-images/'.$cse->profile_avater);
                $filename = uniqid() . '.' . $img->getClientOriginalExtension();
                $img->move('assets/cse-technician-images/', $filename);
                $cse->avatar = $filename;
            }
            $cse->bank_id = $request->bank_id;                      
            $cse->account_number = $request->account_number;                      
            $cse->state_id = $request->state_id;                      
            $cse->lga_id = $request->lga_id;                      
            $cse->town = $request->town;                       
            $cse->full_address = $request->full_address;
            $cse->save();
        } 
        
        Session::flash('success', 'Profile updated successfully!');
        return redirect()->back();
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
            ->with(['cse' => function($query){ 	 
                return $query->select('first_name', 'middle_name', 'last_name', 'gender', 'phone_number', 'other_phone_number', 'avatar', 'account_number', 'bank_id', 'state_id', 'lga_id', 'user_id', 'town', 'full_address');
            }])
            ->first(); 

        $data = [
            'firstName'         =>  $user_data->cse->first_name,
            'middleName'        =>  $user_data->cse->middle_name,
            'lastName'          =>  $user_data->cse->last_name,
            'gender'            =>  $user_data->cse->gender,
            'email'             =>  $user_data->email,
            'phoneNumber'       =>  $user_data->cse->phone_number,
            'otherPhoneNumber'  =>  $user_data->cse->other_phone_number,
            'avatar'            =>  $user_data->cse->avatar,
            'accountNumber'     =>  $user_data->cse->account_number,
            'fullAddress'       =>  $user_data->cse->full_address, 
            'town'              =>  $user_data->cse->town,
            'bankName'          =>  $user_data->cse->bank->name,
            'stateName'         =>  $user_data->cse->state->name,
            'title'             =>  'profile',
        ];
    	return view('cse.view_profile', $data);
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
