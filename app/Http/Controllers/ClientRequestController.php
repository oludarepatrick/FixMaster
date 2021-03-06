<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;
use DB;

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
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Models\RFQ;
use App\Models\PaymentGateway;

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

        // return $request;
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

        //Prerequisites for Email and Message body styling
        $serviceName = Service::where('id', $request->input('service_id'))->first()->name;
        $categoryName = Category::where('id', $request->input('category_id'))->first()->name;
        $serviceFee = $request->input('service_fee');
        $serviceFeeName = $request->input('service_fee_name');
        $timestamp = \Carbon\Carbon::parse($request->input('timestamp'), 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa');
        $paymentMethod =  $request->input('payment_method');

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

            if($request->input('payment_method') == 'Wallet'){
                if(Auth::user()->wallet->balance < $serviceFee){
                    return back()->withInput()->with('error', 'Sorry, you do not have sufficient fund in your E-Wallet. Please select another Payment option.');
                }else{
            
                    $walletbalance = Auth::user()->user->wallet->balance;
            
                    $NewWalletbalance = $walletbalance - $amount;

                    $paymentReference = 'E-WAL-'.strtoupper(substr(md5(time()), 0, 6));

                    $paymentRecord = ReceivedPayment::create([
                        'user_id'               =>  Auth::id(), 
                        'service_request_id'    =>  $createServiceRequest->id,
                        'payment_reference'     =>  $paymentReference, 
                        'payment_method'        =>  $request->input('payment_method'), 
                        'amount'                =>  $amount,
                    ]);

                    Wallet::where('user_id', Auth::id())->update([
                        'balance'   =>    $NewWalletbalance,
                    ]);
            
                    WalletTransaction::create([
                        'user_id'               =>  Auth::id(), 
                        'wallet_id'             =>  Auth::user()->user->wallet->id, 
                        'service_request_id'    =>  $createServiceRequest->id, 
                        'payment_type'          =>  'Payment', 
                        'amount'                =>  $amount,
                    ]);
                }
            }elseif($request->input('payment_method') == 'Offline'){

                $paymentReference = 'Pending Bank Teller';

                $paymentRecord = ReceivedPayment::create([
                    'user_id'               =>  Auth::id(), 
                    'service_request_id'    =>  $createServiceRequest->id,
                    'payment_reference'     =>  $paymentReference, 
                    'payment_method'        =>  $request->input('payment_method'), 
                    'amount'                =>  $amount,
                ]);
            }else{
                //IF payment was successful
                $request->validate([
                    'payment_reference'    =>  'required',
                ]);

                if(!empty($request->input('payment_reference'))){

                    $paymentRecord = ReceivedPayment::create([
                        'user_id'               =>  Auth::id(), 
                        'service_request_id'    =>  $createServiceRequest->id,
                        'payment_reference'     =>  $request->input('payment_reference'), 
                        'payment_method'        =>  $request->input('payment_method'), 
                        'amount'                =>  $amount,
                    ]);

                    $paymentReference = $request->input('payment_reference');

                }else{
                    return back()->withInput()->with('error', 'Sorry, Payment was not successful. Please select another Payment option.');
                }
            }

            
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

                MailController::clientServiceBookingMail(Auth::user()->email, Auth::user()->fullName->name, $createServiceRequest->job_reference, $createServiceRequest->security_code, $serviceName, $categoryName, $amount, $serviceFeeName, $timestamp, $paymentMethod, $paymentReference);


                MailController::adminServiceBookingMailNotification('info@fixmaster.com.ng', Auth::user()->fullName->name, $createServiceRequest->job_reference, $createServiceRequest->security_code, $serviceName, $categoryName, $amount, $serviceFeeName, $timestamp, $paymentMethod, $paymentReference);

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
            // 'payment_reference'         =>   'required',
            // 'payment_response_message'  =>  'required',
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

        if($requestExists->service_request_status_id == '3'){
            return back()->with('error', 'Sorry! This service request('.$requestExists->job_reference.') has already been completed.');
        }

        //Validate user input fields
        $request->validate([
            'reason'       =>   'required',
        ]);

        if(!empty($requestExists->serviceRequestDetail->discount_service_fee)){
            $refundAmount = $requestExists->serviceRequestDetail->discount_service_fee;
        }else{
            $refundAmount = $requestExists->serviceRequestDetail->initial_service_fee;
        }

        $walletbalance = Auth::user()->user->wallet->balance;

        $NewWalletbalance = $refundAmount + $walletbalance;

        //service_request_status_id = Pending(1), Ongoing(4), Completed(3), Cancelled(2) 
        $cancelRequest = ServiceRequest::where('id', $id)->update([
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

        Wallet::where('user_id', Auth::id())->update([
            'balance'   =>    $NewWalletbalance,
        ]);

        WalletTransaction::create([
            'user_id'               =>  Auth::id(), 
            'wallet_id'             =>  Auth::user()->user->wallet->id, 
            'service_request_id'    =>  $id, 
            'payment_type'          =>  'Refund', 
            'amount'                =>  $refundAmount,
        ]);


        $clientId = $requestExists->user_id;
        $clientName = $requestExists->user->fullName->name;
        $clientEmail = $requestExists->user->email;
        $reason = $request->reason;
        $jobReference = $requestExists->job_reference;
        $supervisorId = $requestExists->admin_id;


        if($cancelRequest AND $recordServiceProgress AND $recordCancellation){

            /*
            * Code to send email goes here...
            */

            //Notify CSE and Technician with messages
            $this->cancellationMessage = new EssentialsController();
            $this->cancellationMessage->clientServiceRequestCancellationMessage($clientName, $clientId, $jobReference, $reason);
            $this->cancellationMessage->adminServiceRequestCancellationMessage($clientName, $clientId, $jobReference, $reason, $supervisorId);

            MailController::clientServiceRequestCancellationEmailNotification($clientEmail, $clientName,$jobReference, $reason);
            MailController::adminServiceRequestCancellationEmailNotification('info@fixmaster.com.ng', $clientName,$jobReference, $reason);

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

    public function invoiceDetails($id){

        $invoiceExists = RFQ::findOrFail($id);

        $invoiceDetails = $invoiceExists->rfqBatches;

        // return $invoiceExists;

        $email = Auth::user()->email;
        $clientDiscount = Auth::user()->client->discounted;
        $clientPhoneNumber = Auth::user()->client->phone_number;
        $paystack = PaymentGateway::find(1);
        $flutter = PaymentGateway::find(2);

        $data = [
            'invoiceExists'     =>  $invoiceExists,
            'invoiceDetails'    =>  $invoiceDetails,
            'tax'               =>  0,
            'email'             =>  $email,
            'clientDiscount'    =>  $clientDiscount,
            'paystack'          =>  $paystack,
            'flutter'           =>  $flutter,
            'clientPhoneNumber' =>  $clientPhoneNumber,
        ];

        return view('client.request_invoice', $data)->with('i');

    }

    public function RFQPayment(Request $request){

        // try{
        //Check if client has internect connected
        $this->isConnected = new EssentialsController();

        if($this->isConnected->internetConnection() == false){
            return back()->withInput()->with('error', 'You are currently offline. Please connect to the internet to continue.');
        }

        $serviceRequestId = (int)$request->input('service_request_id');
        $requestExists = ServiceRequest::findOrFail($serviceRequestId);
        $initialServiceFee = $requestExists->total_amount;
        $amount = $request->input('service_fee');
        $totalAmount = $initialServiceFee + $amount;
        $rfqId = $request->input('rfq_id');
        $clientName = $requestExists->user->fullName->name;
        $clientId = Auth::id();
        $clientEmail = $request->input('email');
        $adminId = $requestExists->admin_id;
        $cseId = $requestExists->cse_id;
        $jobReference = $requestExists->job_reference;
        $invoice = $request->input('invoice');
        $paymentReference = $request->input('payment_reference');

        // return [
        //      $clientId, $adminId, $cseId, $serviceRequestId, $requestExists
        // ];
 
        // DB::transaction(function () {

            // return $request;
            $paymentRecord = ReceivedPayment::create([
                'user_id'               =>  Auth::id(), 
                'service_request_id'    =>  $serviceRequestId,
                'payment_reference'     =>  $paymentReference, 
                'payment_method'        =>  'Online', 
                'amount'                =>  $amount,
            ]);

            $updateServiceRequest = ServiceRequest::where('id', $serviceRequestId)->update([
                'total_amount'  =>  $totalAmount,
            ]);

            $updateRFQ = RFQ::where('id', $rfqId)->update([
                'status'  =>  '2'
            ]);
        // });

        if($paymentRecord AND $updateServiceRequest AND $updateRFQ){

            //Notify Client and Admin with messages
            $this->sendMessage = new EssentialsController();
            $this->sendMessage->clientProformaInvoiceSuccessPaymentMessage($clientName, $clientId, $jobReference, $amount, $paymentReference, $invoice);
            $this->sendMessage->adminProformaInvoiceSuccessPaymentMessage($clientName, $adminId, $cseId, $jobReference, $amount, $paymentReference, $invoice);

            //Notify Client and FixMaster Email
            MailController::clientProformaInvoiceSuccessPaymentNotification($clientEmail, $clientName,$jobReference, $amount, $paymentReference, $invoice);
            MailController::adminProformaInvoiceSuccessPaymentNotification('info@fixmaster.com.ng', $clientName, $jobReference, $amount, $paymentReference, $invoice);

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Payment';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' paid a proforma invoice('.$request->invoice.') of ₦'.$amount.' for '.$jobReference.' service request.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('client.requests')->with('success', 'Your Proforma invoice('.$request->invoice.') for'.$jobReference.' service request has been paid.');

        }else{
        // }catch (\Exception $e){
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to pay for Proforma invoice('.$request->invoice.') of '.$jobReference.' service request.';

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to pay for Proforma invoice('.$request->invoice.') of '.$jobReference.' service request.');
        }

        return back()->withInput();
    }

    
}
