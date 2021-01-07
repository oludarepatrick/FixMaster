<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;
use App\Http\Controllers\RecordActivityLogController;
use Auth;
use App\Models\User;
use App\Models\Name;
use App\Models\ReceivedPayment;
use App\Models\DisbursedPayment;
use App\Models\ServiceRequest;

class PaymentsController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function receivedPayments(){

        $receivedPayments = ReceivedPayment::orderBy('created_at', 'DESC')->get();

        // return $receivedPayments;
        
        $data = [
            'receivedPayments'  =>  $receivedPayments,
        ];

        return view('admin.payments.received', $data)->with('i');
    }

    public function disbursedPayments(){

        $disbursedPayments = DisbursedPayment::orderBy('created_at', 'DESC')->get();

        $ongoingServiceRequests = ServiceRequest::where('service_request_status_id', '>', '3')->get();

        $data = [
            'disbursedPayments'         =>  $disbursedPayments,
            'ongoingServiceRequests'    =>  $ongoingServiceRequests,
        ];

        return view('admin.payments.disbursed', $data)->with('i');
    }

    public function recordPayment(Request $request){

        //Validate user input fields
        $this->validateRequest();

        $requestExists = ServiceRequest::findOrFail($request->service_request_id);

        $jobReference = $requestExists->job_reference;

        // return Name::where('user_id', $request->recipient_id)->first()->name;

        $recordPayment = DisbursedPayment::create([
            'user_id'               =>  Auth::id(), 
            'recipient_id'          =>  $request->recipient_id, 
            'service_request_id'    =>  $request->service_request_id, 
            'payment_mode'          =>  $request->payment_mode, 
            'payment_reference'     =>  $request->payment_reference, 
            'amount'                =>  $request->amount, 
            'payment_date'          =>  $request->payment_date, 
            'comment'               =>  $request->comment,
        ]);

        if($recordPayment){

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Payment';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' recorded '.Name::where('user_id', $request->recipient_id)->first()->name.' payment for '.$jobReference.' service request.';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.disbursed_payments')->with('success', 'Your '.$jobReference.' service request payment has been recorded.');

        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to record '.$jobReference.' service request payment for '.Name::where('user_id', $request->recipient_id)->first()->name;

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to cancel '.$jobReference.' service request.');
        }

        return back()->withInput();

    }

    /**
     * Validate user input fields
     */
    private function validateRequest(){
        return request()->validate([
            'service_request_id'=>   'required',
            'recipient_id'      =>   'required',
            'payment_mode'      =>   'required',
            'amount'            =>   'required',
            'payment_date'      =>   'required',
            'payment_reference' =>   'required',
            'comment'           =>  '',
        ]);
    }

    public function getOngoingServiceRequestDetail($id){

        $serviceRequest = ServiceRequest::findOrFail($id);

        $data = [
            'serviceRequest'    =>  $serviceRequest,
        ];

        return view('admin.payments._ongoing_service_request-detail', $data);
    }
}
