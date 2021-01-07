<?php

namespace App\Http\Controllers\CSE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CSE;
use Auth;
use Session;
use Illuminate\Support\Facades\URL; 
use App\Models\ActivityLog;
use App\Models\Technician;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\RecordActivityLogController;
use App\Models\Message;
use Route;

class CSEMessageController extends Controller
{

    public function __construct() {
        $this->middleware('auth:web');
    }

    public function sendMessage(Request $request){
        try {
            $cse = CSE::where('user_id', Auth::id())->first();

            $serviceRequests = $cse->requests;

            $ongoingJobs = $cse->requests()
                            ->where('service_request_status_id', '>', '3')
                            ->get();

            return $ongoingJobs;
            
          } catch (\Throwable $e) {
            return back()->with('error','An error occurred while tyring to update your password. Try again!');
        }
    }

    public function getUserAssigned($id) {
        // $data = Item::where("category", $id)->where("is_deleted", "0")->get();
        // return $data;
        $cse = CSE::where('user_id', Auth::id())->first();
        $serviceRequests = $cse->requests;
        $ongoingJob = $cse->requests()
                        ->where('service_request_status_id', '>', '3')
                        ->where('id', '=', $id)
                        ->get();

        $data = '';
        $data .= '<option value="" selected>Select...</option>';

        foreach($ongoingJob as $item){

            $data .= '<option value='.$item->user_id.'>'.$item->user->fullName->name. '(Client)</option>';
            $data .= '<option value='.$item->admin_id.'>'.$item->admin->first_name.' '.$item->admin->last_name. '(Admin)</option>';
            $data .= '<option value='.$item->technician_id.'>'.$item->technician->first_name.' '.$item->technician->last_name. '(Technician)</option>';
            
            // $data = [
                
            //      $item->user->fullName->name,
            //      $item->admin->first_name.' '.$item->admin->last_name,
            //      $item->technician->first_name.' '.$item->technician->last_name,
            // ];
        };
        return $data;

       }

    

    public function saveMessageData(Request $request){
        // return $request;
        $validatedData = $request->validate([
            'jobReference' => 'required|max:255',
            'subject'   => 'required|max:255',
            'message'   => 'required',
          ]);
          
          $message = new Message;
          $message->sender_id  = Auth::id();
          $message->recipient_id = $request->selectedReciever;
          $message->subject = $request->subject; 
          $message->body = $request->message;
        //   $message->created_at = date('Y-m-d');

        $recipientName = Name::findOrFail($request->selectedReciever);
        $recipientName = $recipientName->name;

        $saveMessage = $message->save(); 

        if($saveMessage){

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Profile';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' sent a message to '.$recipientName;
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('success', 'Message sent successfully!');

        }else{
            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.'was sending a message to '.$recipientName;

            return back()->with('error', 'An error occurred while trying to send Message.');
        }
        //   echo $message;
        return back()->with('success','Message sent successfully!');

    }

    public function inbox(){

        $messages = Auth::user()->receivedMessage()->orderBy('created_at', 'DESC')->get()
        ->groupBy(function ($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        });
        $data = [
            'messages'  =>  $messages
        ];

        return view('cse.messages.inbox', $data);
    }

    public function inboxMessageDetails($id){

        $message = Message::findOrFail($id);

        if($message->is_read == '0'){

            if($message->recipient_id == Auth::id()){
                Message::where('id', $id)->update([
                    'is_read'   =>  '1',
                ]);
            }
        }

        $data = [
            'message'  =>  $message
        ];

        return view('cse.messages._inbox_message_body', $data);
    }

    public function outbox(){
        
        $messages =  Auth::user()->sentMessages()->orderBy('created_at', 'DESC')->get()
        ->groupBy(function ($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        });

        $data = [
            'messages'  =>  $messages
        ];

        return view('cse.messages.outbox', $data);
    }

    public function outboxMessageDetails($id){

        $message = Message::findOrFail($id);

        $data = [
            'message'  =>  $message
        ];

        return view('cse.messages._outbox_message_body', $data);
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
