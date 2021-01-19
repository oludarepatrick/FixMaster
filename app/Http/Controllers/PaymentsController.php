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

        $totalAmounts = 0;

        foreach($receivedPayments as $item){
            $totalAmounts += $item->amount;
        }

        $yearList = array();

        $years = DisbursedPayment::orderBy('created_at', 'ASC')->pluck('created_at');

        $years = json_decode($years);

        if(!empty($years)){
            foreach($years as $year){
                $date = new \DateTime($year);

                $yearNumber = $date->format('y');

                $yearName = $date->format('Y');
                
                array_push($yearList, $yearName);
            }
        }

        $years = array_unique($yearList);

        $message = '';
        
        $data = [
            'receivedPayments'  =>  $receivedPayments,
            'years'             =>  $years,
            'message'           =>  $message,
            'totalAmounts'      =>  $totalAmounts,
        ];

        return view('admin.payments.received', $data)->with('i');
    }

    public function disbursedPayments(){

        $disbursedPayments = DisbursedPayment::orderBy('created_at', 'DESC')->get();

        $ongoingServiceRequests = ServiceRequest::where('service_request_status_id', '>', '3')->get();

        $yearList = array();

        $years = DisbursedPayment::orderBy('created_at', 'ASC')->pluck('created_at');

        $years = json_decode($years);

        if(!empty($years)){
            foreach($years as $year){
                $date = new \DateTime($year);

                $yearNumber = $date->format('y');

                $yearName = $date->format('Y');
                
                array_push($yearList, $yearName);
            }
        }

        $years = array_unique($yearList);

        $message = '';

        $totalAmounts = 0;

        foreach($disbursedPayments as $item){
            $totalAmounts += $item->amount;
        }

        $data = [
            'disbursedPayments'         =>  $disbursedPayments,
            'ongoingServiceRequests'    =>  $ongoingServiceRequests,
            'years'                     =>  $years,
            'message'                   =>  $message,
            'totalAmounts'      =>  $totalAmounts,
        ];

        return view('admin.payments.disbursed', $data)->with('i');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * This is an ajax call to sort Disbursed Payments 
     * present on change of Date Type select dropdown
     */
    public function sortDisbursedPayments(Request $request){
        if($request->ajax()){

            // return $request;
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
            
            if($level === 'Level One'){

                $disbursedPayments = DisbursedPayment::where('type', $type)
                ->orderBy('created_at', 'DESC')->get();

                $message = 'Showing Disbursed Payment of "'.$type.'"';

                $data = [
                    'disbursedPayments'  =>  $disbursedPayments,
                    'message'       =>  $message,
                ];

                return view('admin.payments._disbursed_table', $data)->with('i');
            }

            if($level === 'Level Two'){

                if(!empty($specificDate)){
                    $disbursedPayments = DisbursedPayment::whereDate('created_at', $specificDate)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Disbursed Payments for '.\Carbon\Carbon::parse($specificDate, 'UTC')->isoFormat('LL');
                }

                $data = [
                    'disbursedPayments'     =>  $disbursedPayments,
                    'message'               =>  $message,
                ];

                return view('admin.payments._disbursed_table', $data)->with('i');

            }

            if($level === 'Level Three'){
                
                if(!empty($specificYear)){
                    $disbursedPayments = DisbursedPayment::whereYear('created_at', $specificYear)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Disbursed Payments for year '.$specificYear;
                }

                $data = [
                    'disbursedPayments'     =>  $disbursedPayments,
                    'message'               =>  $message,
                ];

                return view('admin.payments._disbursed_table', $data)->with('i');
            }

            if($level === 'Level Four'){
                
                if(!empty($specificYear) && !empty($specificMonth)){
                    $disbursedPayments = DisbursedPayment::whereYear('created_at', $specificYear)
                    ->whereMonth('created_at', $specificMonth)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Disbursed Payments for "'.$specificMonthName.'" in year '.$specificYear;
                }

                $data = [
                    'disbursedPayments'  =>  $disbursedPayments,
                    'message'       =>  $message,
                ];

                return view('admin.payments._disbursed_table', $data)->with('i');
            }

            if($level === 'Level Five'){

                if(!empty($dateFrom) && !empty($dateTo)){
                    $disbursedPayments = DisbursedPayment::whereBetween('created_at', [$dateFrom, $dateTo])
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Disbursed Payments from "'.\Carbon\Carbon::parse($dateFrom, 'UTC')->isoFormat('LL').'" to "'.\Carbon\Carbon::parse($dateTo, 'UTC')->isoFormat('LL').'"';
                }

                $data = [
                    'disbursedPayments'  =>  $disbursedPayments,
                    'message'       =>  $message,
                ];

                return view('admin.payments._disbursed_table', $data)->with('i');
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * This is an ajax call to sort Received Payments 
     * present on change of Date Type select dropdown
     */
    public function sortReceivedPayments(Request $request){
        if($request->ajax()){

            // return $request;
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
            
            if($level === 'Level One'){

                $receivedPayments = ReceivedPayment::where('type', $type)
                ->orderBy('created_at', 'DESC')->get();

                $message = 'Showing Received Payment of "'.$type.'"';

                $data = [
                    'receivedPayments'     =>  $receivedPayments,
                    'message'               =>  $message,
                ];

                return view('admin.payments._received_table', $data)->with('i');
            }

            if($level === 'Level Two'){

                if(!empty($specificDate)){
                    $receivedPayments = ReceivedPayment::whereDate('created_at', $specificDate)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Received Payments for '.\Carbon\Carbon::parse($specificDate, 'UTC')->isoFormat('LL');
                }

                $data = [
                    'receivedPayments'      =>  $receivedPayments,
                    'message'               =>  $message,
                ];

                return view('admin.payments._received_table', $data)->with('i');

            }

            if($level === 'Level Three'){
                
                if(!empty($specificYear)){
                    $receivedPayments = ReceivedPayment::whereYear('created_at', $specificYear)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Received Payments for year '.$specificYear;
                }

                $data = [
                    'receivedPayments'     =>  $receivedPayments,
                    'message'              =>  $message,
                ];

                return view('admin.payments._received_table', $data)->with('i');
            }

            if($level === 'Level Four'){
                
                if(!empty($specificYear) && !empty($specificMonth)){
                    $receivedPayments = ReceivedPayment::whereYear('created_at', $specificYear)
                    ->whereMonth('created_at', $specificMonth)
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Received Payments for "'.$specificMonthName.'" in year '.$specificYear;
                }

                $data = [
                    'receivedPayments'     =>  $receivedPayments,
                    'message'              =>  $message,
                ];

                return view('admin.payments._received_table', $data)->with('i');
            }

            if($level === 'Level Five'){

                if(!empty($dateFrom) && !empty($dateTo)){
                    $receivedPayments = ReceivedPayment::whereBetween('created_at', [$dateFrom, $dateTo])
                    ->orderBy('created_at', 'DESC')->get();

                    $message = 'Showing Received Payments from "'.\Carbon\Carbon::parse($dateFrom, 'UTC')->isoFormat('LL').'" to "'.\Carbon\Carbon::parse($dateTo, 'UTC')->isoFormat('LL').'"';
                }

                $data = [
                    'receivedPayments'     =>  $receivedPayments,
                    'message'              =>  $message,
                ];

                return view('admin.payments._received_table', $data)->with('i');
            }
        }
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
