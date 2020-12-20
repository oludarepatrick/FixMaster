<?php

namespace App\Http\Controllers\CSE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use App\Models\State;
use App\Models\Lga;
use Auth;
use Session;

class CSEProfileController extends Controller
{

    public function __construct() {
        $this->middleware('auth:web');
    }

    //call the profile page with credentials
    public function edit_profile(Request $request)
    {
        $user_dat=\Auth::user();

        $user_data = User::where('id', Auth::id())
                    ->select('id', 'email')
                    ->with(['cse' => function($query){ 	 
                        return $query->select('first_name', 'middle_name', 'last_name', 'phone_number', 'other_phone_number', 'avatar', 'account_number', 'bank_id', 'state_id', 'user_id', 'town', 'full_address');
                    }])
                    ->first();            
        $bank_data = Bank::where('id', $user_data->cse->bank_id)
                        ->select('name')
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
            'email'             =>  $user_data->email,
            'phoneNumber'       =>  $user_data->cse->phone_number,
            'otherPhoneNumber'  =>  $user_data->cse->other_phone_number,
            'avatar'            =>  $user_data->cse->avatar,
            'accountNumber'     =>  $user_data->cse->account_number,
            'fullAddress'       =>  $user_data->cse->full_address, 
            'town'              =>  $user_data->cse->town,
            'bankName'          =>  $bank_data->name, 
            'stateName'         =>  $state_data->name,
            'allStates'         =>  State::all(),
            'allBanks'          =>  Bank::all(),
            'allLgas'           =>  Lga::all(),
            'title'             =>  'profile',
        ];

            // echo '<pre>';
            // echo json_encode($state_data);
            // echo '</pre>';

    	return view('cse.edit_profile',$data);
    }

    public function update_profile(Request $request)
    {
        $page = 'profile_form';
        purifyInputData($request);
        $id=$request->id;
    	$validator=Validator::make($request->all(), [
    	    'name' => 'required|regex:/^[\pL\s-]+$/u|max:255',
            'contact_number' => 'required|digits_between:6,12|unique:admins,contact_number,'.$id,
             'profile_image' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif|max:255',
    	],['profile_image'=>'Image should be png/PNG, jpg/JPG',
        ]);

        if ($validator->fails()) {
            return redirect()->route($role, ['page'=>$page])->with('error',$validator->errors()->first());
        }
        $user = Admin::findOrFail($id);
    	$user->fill($request->all())->update();
    	// $data=$request->all();
    	// $result = Admin::updateOrCreate(['id' => $id], $data);
    	if (isset($request->profile_image) && $request->profile_image != null) {
            $user->clearMediaCollection('profile_image');
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }

        return redirect()->route($role, ['page'=>$page])->withSuccess(__('messages.profile').' '.__('messages.msg_updated'));
    }

    // public function edit_profile(Request $request)
    // {
    //         $cse = User::where('id', Auth::id())
    //         ->select('id', 'email')
    //         ->with(['cse' => function($query){
    //             return $query->select('first_name', 'middle_name', 'last_name', 'phone_number', 'user_id');
    //         }])
    //         ->first();

    //         $data = [
    //             'firstName'         =>  $cse->cse->first_name,
    //             'middleName'        =>  $cse->cse->middle_name,
    //             'lastName'          =>  $cse->cse->last_name,
    //             'email'             =>  $cse->email,
    //             'phoneNumber'       =>  $cse->cse->phone_number,
    //         ];

    //         $pageTitle  ='Setting';
    //         return view('cse.edit_profile', $data);
  

    //     }

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
