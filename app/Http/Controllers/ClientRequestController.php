<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;

use App\Http\Controllers\MailController;
use App\Http\Controllers\EssentialsController;
use App\Http\Controllers\RecordActivityLogController;

use Auth;
use App\Models\User;
use App\Models\Client;
use App\Models\ServiceRequest;
use App\Models\ServiceRequestDetail;
use App\Models\ServiceRequestProgress;
use App\Models\ServiceRequestCanellation;

use App\Models\Category;
use App\Models\Service;
use App\Models\Name;
use App\Models\Message;
use App\Models\ReceivedPayment;

class ClientRequestController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $userServiceRequests = Auth::user()->requests()->orderBy('created_at', 'DESC')->get();

        $createdBy = Name::get();

        $data = [
            'userServiceRequests'   =>  $userServiceRequests,
            'createdBy'             =>  $createdBy,
        ];

        return view('client.requests', $data)->with('i');
    }

    public function requestDetails($ref){

        $requestDetail = ServiceRequest::findOrFail($ref);
        // return $requestDetail->cse;
        $data = [
            'requestDetail'   =>  $requestDetail,
        ];

        return view('client.request_details', $data);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        return $request->input('payment_method');
        //Check if client has internect connected
        $this->isConnected = new EssentialsController();

        if($this->isConnected->internetConnection() == false){
            return back()->withInput()->with('error', 'You are currently offline. Please connect to the internet to continue.');
        }
        
        //Validate user input fields
        $this->validateRequest();

        //Determine if the User prefers to use the phone in his/her profile or not
        if($request->input('phone_number') == 'yes'){
            $phoneNumber = Auth::user()->client->phone_number;

        }else{
            $request->validate([
                'alternate_phone_number'    =>  'required',
            ]);

            $phoneNumber = $request->input('alternate_phone_number');
        }

        //Determine if the User prefers to use the address in his/her profile or not
        if($request->input('address') == 'yes'){
            $address = Auth::user()->client->full_address;

        }else{
            $request->validate([
                'alternate_address'    =>  'required',
            ]);

            $address = $request->input('alternate_address');
        }
        
        $serviceName = Service::where('id', $request->input('service_id'))->first()->name;
        $categoryName = Category::where('id', $request->input('category_id'))->first()->name;
        $serviceFee = $request->input('service_fee');
        $serviceFeeName = $request->input('service_fee_name');
        $timestamp = \Carbon\Carbon::parse($request->input('timestamp'), 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa');
        //Determine if User has a discount of 5%
        if(Auth::user()->client->discounted == 1){
            $discountServiceFee = null;
            $amount = $serviceFee;

        }else {
            $discountServiceFee = 0.95 * $serviceFee;
            $amount = $discountServiceFee;
        }

        //Determine if User has enough money in his/her E-Wallet
        if($request->input('payment_method') == 'Wallet'){
            if(Auth::user()->wallet->balance < $serviceFee){
                return back()->withInput()->with('error', 'Sorry, you do not have sufficient fund in yout E-Wallet. Please select another Payment option.');
            }
        }

        //Determine if User uploaded a file
        if($request->hasFile('media_file')){
            // return 'here';
            $request->validate([
                // 'media_file'    =>  'required|mimes:zip,mp3,mp2,doc,docx,pdf,txt,xls,csv,jpg,png,jpeg,gif,svg,3gp,mp4,mov,avi,flv,wmv,ogg|max:2048',
                'media_file'    =>  'required|mimes:doc,docx,pdf,txt,xls,csv,jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $mediaFile = $request->file('media_file');
            $mediaFileName = sha1(time()) .'.'.$mediaFile->getClientOriginalExtension();

        }else{
            $mediaFileName = null;
        }


        //IF payment was successful
        if($request->payment_response_message === 'success'){
            //Generate security code
            $this->randomStringGenerator = new EssentialsController();

            $createServiceRequest = ServiceRequest::create([
                'user_id'                   =>  Auth::id(), 
                'service_id'                =>  $request->input('service_id'), 
                'category_id'               =>  $request->input('category_id'), 
                'job_reference'             =>  'REF-'.$this->randomStringGenerator->randomStringGenerator(8),
                'security_code'             =>  'SEC-'.strtoupper(substr(md5(time()), 0, 8)),
                'service_request_status_id' =>  '1',
                'total_amount'              =>  $amount,
            ]);

            $createServiceRequestDetail = ServiceRequestDetail::create([
                'service_request_id'        =>  $createServiceRequest->id,
                'state_id'                  =>  Auth::user()->client->state_id, 
                'lga_id'                    =>  Auth::user()->client->lga_id,
                'town'                      =>  Auth::user()->client->town,
                'initial_service_fee'       =>  $serviceFee, 
                'discount_service_fee'      =>  $discountServiceFee, 
                'service_fee_name'          =>  $request->input('service_fee_name'), 
                'phone_number'              =>  $phoneNumber, 
                'address'                   =>  $address, 
                'description'               =>  $request->input('description'), 
                'timestamp'                 =>  $timestamp, 
                'media_file'                =>  $mediaFileName, 
                'payment_method'            =>  $request->input('payment_method'),
            ]);

            $paymentRecord = ReceivedPayment::create([
                'user_id'               =>  Auth::id(), 
                'service_request_id'    =>  $createServiceRequest->id,
                'payment_reference'     =>  $request->payment_reference, 
                'payment_method'        =>  $request->input('payment_method'), 
                'amount'                =>  $amount,
            ]);

            if($createServiceRequest AND $createServiceRequestDetail){

                if(Auth::user()->client->discounted == 0){

                    Client::where('user_id', Auth::id())->update([
                        'discounted'    =>  '1',
                    ]);
                }

                if(!empty($mediaFileName)){
                    $mediaFile->move(public_path('assets/service-request-files'), $mediaFileName);
                }

                $this->sendMessage = new EssentialsController();

                $this->sendMessage->successServiceRequestMessage($createServiceRequest->job_reference, $createServiceRequest->security_code, $serviceName, $categoryName, $amount, $serviceFeeName, $timestamp);

                // MailController::clientServiceBookingMail(Auth::user()->email, Auth::user()->fullName->name, $createServiceRequest->job_reference, $createServiceRequest->security_code, $serviceName, $categoryName, $amount, $serviceFeeName, $timestamp);

                // MailController::adminServiceBookingMailNotification('info@fixmaster.com.ng', Auth::user()->fullName->name, $createServiceRequest->job_reference, $createServiceRequest->security_code, $serviceName, $categoryName, $amount, $serviceFeeName, $timestamp);

                $this->addRecord = new RecordActivityLogController();
                $id = Auth::id();
                $type = 'Request';
                $severity = 'Informational';
                $actionUrl = Route::currentRouteAction();
                $controllerActionPath = URL::full();
                $message = Auth::user()->fullName->name.' requested '.$categoryName.' service';
                $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

                return redirect()->route('client.requests')->with('success', 'Your request was successful.');

            }else{

                //Record crurrenlty logged in user activity
                $this->addRecord = new RecordActivityLogController();
                $id = Auth::id();
                $type = 'Errors';
                $severity = 'Error';
                $actionUrl = Route::currentRouteAction();
                $controllerActionPath = URL::full();
                $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to book a service '.$categoryExists->name.' category.';
                $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

                return back()->with('error', 'An error occurred while trying to book a service.')->withInput();

            }
            

        }else{
            return back()->withInput()->with('error', 'Sorry, Payment was not successful. Please select another Payment option.');
        }
        

        return back()->withInput();


    }

    /**
     * Validate user input fields
     */
    private function validateRequest(){
        return request()->validate([
            'service_fee'               =>   'required',
            'description'               =>   'required',
            'timestamp'                 =>   'required',
            'phone_number'              =>   'required',
            'address'                   =>   'required',
            'payment_method'            =>   'required',
            'payment_reference'         =>   'required',
            'payment_response_message'  =>  'required',
        ]);
    }

    public function edit($id){

        $userServiceRequest = ServiceRequest::findOrFail($id);

        $data = [
            'userServiceRequest'    =>  $userServiceRequest,
        ];

        return view('client._request_edit', $data);
    }

    public function update(Request $request, $id){

        $requestExist = ServiceRequest::findOrFail($id);

        $request->validate([
            'timestamp'             =>   'required',
            'phone_number'          =>   'required',
            'address'               =>   'required',
            'description'           =>   'required',
        ]);


        $timestamp = \Carbon\Carbon::parse($request->input('timestamp'), 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa');

        $updateServiceRequest = ServiceRequestDetail::where('service_request_id', $id)->update([
            'timestamp'             =>   $timestamp,
            'phone_number'          =>   $request->phone_number,
            'address'               =>   $request->address,
            'description'           =>   $request->description,
        ]);

        if($updateServiceRequest){

            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Request';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' updated '.$requestExist->job_reference.' service request.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('client.requests')->with('success', $requestExist->job_reference.' was successfully updated.');

        }else{

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to update '.$requestExist->job_reference.' service request.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to update a '.$requestExist->job_reference.' service request.');
        }
       
        return back()->withInput();
    }

    public function markRequestAsCompleted($id){

        $requestExists = ServiceRequest::findOrFail($id);

        //service_request_status_id = Pending(1), Ongoing(4), Completed(3), Cancelled(2) 
        $markAsCompleted = ServiceRequest::where('id', $id)->update([
            'service_request_status_id' =>  '3',
        ]);

        $jobReference = $requestExists->job_reference;

        //Create record in `service_request_progress` table
        $recordServiceProgress = ServiceRequestProgress::create([
            'user_id'                       =>  Auth::id(), 
            'service_request_id'            =>  $id, 
            'service_request_status_id'     =>  '3',
        ]);

        if($markAsCompleted AND $recordServiceProgress){

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Request';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' marked '.$jobReference.' as completed';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('client.requests')->with('success', $jobReference.' has been marked as completed. Kindly rate our professionals. Thanks');

        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to to mark '.$jobReference.' as completed';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to mark '.$jobReference.' as completed.');
        }

        return back()->withInput();

    }

    public function cancelRequest(Request $request, $id){

        $requestExists = ServiceRequest::findOrFail($id);

        //Validat user input fields
        $request->validate([
            'reason'       =>   'required',
        ]);

        //service_request_status_id = Pending(1), Ongoing(4), Completed(3), Cancelled(2) 
        $markAsCompleted = ServiceRequest::where('id', $id)->update([
            'service_request_status_id' =>  '2',
        ]);

        $jobReference = $requestExists->job_reference;

        //Create record in `service_request_progress` table
        $recordServiceProgress = ServiceRequestProgress::create([
            'user_id'                       =>  Auth::id(), 
            'service_request_id'            =>  $id, 
            'service_request_status_id'     =>  '2',
        ]);

        $recordCancellation = ServiceRequestCanellation::create([
            'user_id'                       =>  Auth::id(), 
            'service_request_id'            =>  $id, 
            'reason'                        =>  $request->reason,
        ]);


        if($markAsCompleted AND $recordServiceProgress AND $recordCancellation){

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Request';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' cancelled '.$jobReference.' service request.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('client.requests')->with('success', 'Your '.$jobReference.' service request has been cancelled.');

        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to cancel '.$jobReference.' service request.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to cancel '.$jobReference.' service request.');
        }

        return back()->withInput();
    }
}
