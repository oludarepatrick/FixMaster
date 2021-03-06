<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL; 
use Route;
use Auth;
use Image;

use App\Models\User;
use App\Models\CSE;
use App\Models\Category;

use App\Models\CSECategory;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Name;
use App\Models\State;
use App\Models\Bank;
use App\Models\ActivityLog;

use App\Http\Controllers\RecordActivityLogController;
use App\Http\Controllers\EssentialsController;

class AdminCSEController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $cses = User::select('id', 'created_at', 'email', 'is_active')
        ->with(['cses' => function($query){
            return $query->select('tag_id', 'gender', 'phone_number', 'user_id');
        }])
        ->with(['fullName' => function($name){
            return $name->select(['name', 'user_id']);
        }])
        ->where('users.designation', '[CSE_ROLE]')
        // ->withTrashed()
        ->orderBy('users.is_active', 'DESC')
        ->latest('users.created_at')
        ->get();

        // return $cses;

        // $createdBy = Name::get();

        $data = [
            'cses'    =>  $cses,
            // 'createdBy' =>  $createdBy,
        ];

        return view('admin.users.cse.list', $data)->with('i');
    }

    public function create(){

        $states = State::select('id', 'name')->orderBy('name', 'ASC')->get();

        $banks = Bank::select('id', 'name')->orderBy('name', 'ASC')->get();

        $services = Service::select('id', 'name')
        ->where('id', '!=', 1)
        ->where('is_active', '1')
        ->orderBy('name', 'ASC')
        ->with(['categories'    =>  function($query){
            return $query->select('id', 'name', 'url', 'image', 'service_id');
        }])
        ->has('categories')->get();

        // return $services;

        $data = [
            'states'    =>  $states,
            'banks'     =>  $banks,
            'services'  =>  $services,
        ];

        return view('admin.users.cse.add', $data);
    }

    public function store(Request $request){

        // return $request;
        //Validate user input fields
        $this->validateRequest();

        //Validate if an image file was selected 
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $avatarName = sha1(time()) .'.'.$image->getClientOriginalExtension();
            $imagePath = public_path('assets/cse-technician-images').'/'.$avatarName;
        }
        //Create new User record on `users` table
        $createUserRecord = User::create([
            'email'                         =>   $request->input('email'),
            'email_verified_at'             =>   \Carbon\Carbon::now(),
            'email_verification_token'      =>   sha1(time()),
            'is_email_verified'             =>   '1',
            'password'                      =>   Hash::make($request->input('password')),
            'designation'                   =>   '[CSE_ROLE]',
            'is_active'                     =>   $request->input('is_active'),
        ]);

        //Create new User record on `cses` table
        $createCSERecord = CSE::create([
            'user_id'               =>  $createUserRecord->id,
            'created_by'            =>  Auth::id(),
            'state_id'              =>  $request->input('state_id'),
            'lga_id'                =>  $request->input('lga_id'),
            'bank_id'               =>  $request->input('bank_id'),
            'tag_id'                =>  'CSE-'.strtoupper(substr(md5(time()), 0, 8)),
            'first_name'            =>  $request->input('first_name'),
            'middle_name'           =>  $request->input('middle_name'),
            'last_name'             =>  $request->input('last_name'),
            'gender'                =>  $request->input('gender'),
            'phone_number'          =>  $request->input('phone_number'),
            'other_phone_number'    =>  $request->input('other_phone_number'),
            'account_number'        =>  $request->input('account_number'),
            'avatar'                =>  $avatarName,
            'town'                  =>  $request->input('town'),
            'full_address'          =>  $request->input('full_address'),
        ]);

        //Create new User record on `names` table
        $createNameRecord = Name::create([
            'user_id'           =>  $createUserRecord->id,
            'name'              =>  $request->input('first_name').' '.$request->input('last_name'),
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $cseName = $request->input('first_name').' '.$request->input('last_name');
        $cseId = $createUserRecord->id;

        if($createUserRecord AND $createCSERecord AND $createNameRecord){

            //Create new User record on `cse_category` pivot table
            $cseCategories = $request->input('cse_category');

            foreach($cseCategories as $cseCategory){
                $createCategoriesRecord = CSECategory::create([
                    'cse_id'        =>  $createCSERecord->id,
                    'category_id'   =>  $cseCategory,
                ]);
            }

            Image::make($image->getRealPath())->fit(300, 500)->save($imagePath);

            $this->cseWelcomeMessage = new EssentialsController();
            $this->cseWelcomeMessage->cseWelcomeMessage($cseName, $cseId, $email, $password);

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
            'state_id'                  =>   'required',
            'lga_id'                    =>   'required',
            'bank_id'                   =>   '',
            'is_active'                 =>   'required',
            'first_name'                =>   'required',
            'middle_name'               =>   '',
            'last_name'                 =>   'required',
            'email'                     =>   'required|email|unique:users,email', 
            'gender'                    =>   'required',
            'cse_category'                    =>   'required',
            'phone_number'              =>   'required|Numeric|unique:cses,phone_number,other_phone_number', 
            // 'other_phone_number'        =>   'unique:cses,other_phone_number,phone_number', 
            'password'                  =>   'required|min:8',
            'confirm_password'          =>   'required|same:password', 
            'avatar'                    =>   'required|mimes:jpg,png,jpeg,gif,svg|max:1014',
            'account_number'            =>   '',
            'town'                      =>   'required',
            'full_address'              =>   'required',
        ]);
    }

    public function show($user){

        $cse = User::findOrFail($user);

        // return $cse->cse;
        
        if($cse->designation != '[CSE_ROLE]'){
            return back();
        }
      //service_request_status_id = Pending(1), Ongoing(4), Completed(3), Cancelled(2) 
        $completedRequests = $cse->cse->requests()->where('service_request_status_id', '3')->count();
        $cancelledRequests = $cse->cse->requests()->where('service_request_status_id', '2')->count();
        $totalRequests = $cse->cse->requests()->count();

        $cseCategories = $cse->cse->cseCategories;
        foreach($cseCategories as $cseCategory){
            $categoryNames[] = Category::where('id', $cseCategory->category_id)->first()->name;
        }
        
        if(empty($categoryNames)){
            $categoryNames = '';
        }else{
            $categoryNames = $categoryNames;
        }

        $activityLogs = $cse->activityLogs()->orderBy('created_at', 'DESC')->get();

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

        $payments = $cse->cseTechnicianDisbursedPayments()->latest()->get();

        $years = array_unique($yearList);

        $createdBy = Name::get();

        $data = [
            'cse'               =>  $cse,
            'totalRequests'     =>  $totalRequests,
            'completedRequests' =>  $completedRequests,
            'cancelledRequests' =>  $cancelledRequests,
            'createdBy'         =>  $createdBy,
            'categoryNames'     =>  $categoryNames,
            'activityLogs'      =>  $activityLogs,
            'message'           =>  $message,
            'years'             =>  $years,
            'userId'            =>  $user,
            'totalFee'          =>  0,
            'totalPaymentAmount'=>  0,
            'payments'          =>  $payments,

        ];

        return view('admin.users.cse.summary', $data)->with('i');
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
   
        if($userExists->designation != '[CSE_ROLE]'){
            return back();
        }

        $cse = User::ActiveCSE($user)->first();

        $states = State::select('id', 'name')->orderBy('name', 'ASC')->get();

        $banks = Bank::select('id', 'name')->orderBy('name', 'ASC')->get();

        $services = Service::select('id', 'name')
        ->where('id', '!=', 1)
        ->where('is_active', '1')
        ->orderBy('name', 'ASC')
        ->with(['categories'    =>  function($query){
            return $query->select('id', 'name', 'url', 'image', 'service_id');
        }])
        ->has('categories')->get();

        $cseCategories = CSE::where('user_id', $user)->first();
        
        $cseCategories = $cseCategories->cseCategories;

        $data = [
            'cse'               =>  $cse,
            'states'            =>  $states,
            'banks'             =>  $banks,
            'services'          =>  $services,
            'cseCategories'     =>  $cseCategories,
        ];

        return view('admin.users.cse.edit', $data);
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

        $userExists = User::findOrFail($id);

        //Validate user input fields
        $this->validateUpdateRequest($id);

        //Get id from `cses` table 
        $userId = $userExists->cse->id;

        //Get currently selected categories 
        $cseCategories = $request->input('cse_category');

        if(!empty($cseCategories)){
            foreach($cseCategories as $cseCategory){
                CSECategory::where('cse_id', $userId)->delete();
            }
        }

        //Validate if an image file was selected 
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $avatarName = sha1(time()) .'.'.$image->getClientOriginalExtension();
            $imagePath = public_path('assets/cse-technician-images').'/'.$avatarName;

            //Delete old image
            if(\File::exists(public_path('assets/cse-technician-images/'.$request->input('old_avatar')))){
                $done = \File::delete(public_path('assets/cse-technician-images/'.$request->input('old_avatar')));
                if($done){
                    // echo 'File has been deleted';
                }
            }

            //Move new image to `cse-technician-images` folder
            Image::make($image->getRealPath())->fit(300, 500)->save($imagePath);
        }else{
            $avatarName = $request->input('old_avatar');
        }

        //Update User record on `users` table
        $updateUserRecord = User::where('id', $id)->update([
            'email'             =>   $request->input('email'),
        ]);

        //Update User record on `admins` table
        $updateAdminRecord = CSE::where('id', '=', $userId)->update([
            'state_id'              =>  $request->input('state_id'),
            'lga_id'                =>  $request->input('lga_id'),
            'bank_id'               =>  $request->input('bank_id'),
            'first_name'            =>  $request->input('first_name'),
            'middle_name'           =>  $request->input('middle_name'),
            'last_name'             =>  $request->input('last_name'),
            'gender'                =>  $request->input('gender'),
            'phone_number'          =>  $request->input('phone_number'),
            'other_phone_number'    =>  $request->input('other_phone_number'),
            'account_number'        =>  $request->input('account_number'),
            'avatar'                =>  $avatarName,
            'town'                  =>  $request->input('town'),
            'full_address'          =>  $request->input('full_address'),
        ]);

        //Update User record on `names` table
        $updateNameRecord = Name::where('user_id', $id)->update([
            'name'              =>  $request->input('first_name').' '.$request->input('last_name'),
        ]);

        if($updateUserRecord && $updateNameRecord ){

            //Create new User record on `cse_category` pivot table
            foreach($cseCategories as $cseCategory){
                $createCategoriesRecord = CSECategory::create([
                    'cse_id'        =>  $userId,
                    'category_id'   =>  $cseCategory,
                ]);
            }

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' updated '.$request->input('first_name').' '.$request->input('last_name').'\'s profile';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.list_cse')->with('success', $request->input('first_name').' '.$request->input('last_name').'\'s profile was successfully updated.');

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
            'state_id'                  =>   'required',
            'lga_id'                    =>   'required',
            'bank_id'                   =>   '',
            'first_name'                =>   'required',
            'middle_name'               =>   '',
            'last_name'                 =>   'required',
            'email'                     =>   'required|email|unique:users,email,'.$id.',id', 
            'phone_number'              =>   'required|Numeric|unique:cses,phone_number,'.$id.',user_id', 
            'gender'                    =>   'required',
            'cse_category'              =>   'required',
            'account_number'            =>   '',
            'town'                      =>   'required',
            'full_address'              =>   'required',
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
            
            return redirect()->route('admin.list_cse')->with('success', 'CSE Profile has been deleted.');
            
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

            return back()->with('error', 'An error occurred while trying to delete CSE Profile.');
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

            return redirect()->route('admin.list_cse')->with('success', 'CSE Profile has been deactivated.');
            
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

            return back()->with('error', 'An error occurred while trying to deactivate CSE Profile.');
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

            return redirect()->route('admin.list_cse')->with('success', 'CSE has been reinstated.');
            
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

                return view('admin.users.cse._activity_log_table', $data)->with('i');

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

                return view('admin.users.cse._activity_log_table', $data)->with('i');

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

                return view('admin.users.cse._activity_log_table', $data)->with('i');
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

                return view('admin.users.cse._activity_log_table', $data)->with('i');
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

                return view('admin.users.cse._activity_log_table', $data)->with('i');
            }

        }
    }
}
