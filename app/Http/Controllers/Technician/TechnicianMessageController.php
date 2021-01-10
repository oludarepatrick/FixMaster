<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Support\Facades\URL; 
use App\Models\ActivityLog;
use App\Models\Message;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\RecordActivityLogController;
use App\Models\Technician;
use App\Models\Name;
use Route;

class TechnicianMessageController extends Controller
{

    public function __construct() {
        $this->middleware('auth:web');
    }


    public function sendMessage(Request $request){
        try {
            $technician = Technician::where('user_id', Auth::id())->first();

            $serviceRequests = $technician->requests;

            $ongoingJobs = $technician->requests()
                            ->where('service_request_status_id', '>', '3')
                            ->get();

            return $ongoingJobs;
            
          } catch (\Throwable $e) {
            return back()->with('error','An error occurred while tyring to update your password. Try again!');
        }
    }

    public function getUserAssigned($id) {
        $technician = Technician::where('user_id', Auth::id())->first();
        $serviceRequests = $technician->requests;
        $ongoingJob = $technician->requests()
                        ->where('service_request_status_id', '>', '3')
                        ->where('id', '=', $id)
                        ->get();

        $data = '';
        $data .= '<option value="" selected>Select...</option>';

        foreach($ongoingJob as $item){

            $data .= '<option value='.$item->user_id.'>'.$item->user->fullName->name. '(Client)</option>';
            $data .= '<option value='.$item->admin_id.'>'.$item->admin->first_name.' '.$item->admin->last_name. '(Admin)</option>';
            $data .= '<option value='.$item->cse_id.'>'.$item->cse->first_name.' '.$item->cse->last_name. '(CSE)</option>';

        };
        return $data;

    }

    public function saveMessageData(Request $request){
        
        $validatedData = $request->validate([
            'subject'       => 'required|max:191',
            'message'       => 'required',
        ]);
          
        $message = new Message;
        $message->sender_id  = Auth::id();

        if(!empty($request->selectedReciever)){

            $validatedData = $request->validate([
                'selectedReciever'  => 'required',
            ]);

            $message->recipient_id = $request->selectedReciever;
            $recipientName = Name::findOrFail($request->selectedReciever);

        }
        if(!empty($request->recipient_id)){

            $validatedData = $request->validate([
                'recipient_id'  => 'required',
            ]);

            $message->recipient_id = $request->recipient_id;
            $recipientName = Name::findOrFail($request->recipient_id);

        }

        $message->subject = $request->subject; 
        $message->body = $request->message;
        //   $message->created_at = date('Y-m-d');

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

        $messages =  Auth::user()->receivedMessages()->orderBy('created_at', 'DESC')->get()
        ->groupBy(function ($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        });

        $data = [
            'messages'  =>  $messages
        ];

        return view('technician.messages.inbox', $data);
    }

    public function inboxMessageDetails($id){

        $message = Message::findOrFail($id);

        if($message->is_read == '0'){
            Message::where('id', $id)->update([
                'is_read'   =>  '1',
            ]);
        }

        $data = [
            'message'  =>  $message
        ];

        return view('technician.messages._inbox_message_body', $data);
    }

    public function outbox(){
        
        $messages =  Auth::user()->sentMessages()->orderBy('created_at', 'DESC')->get()
        ->groupBy(function ($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        });

        $data = [
            'messages'  =>  $messages
        ];

        return view('technician.messages.outbox', $data);
    }

    public function outboxMessageDetails($id){

        $message = Message::findOrFail($id);

        if($message->is_read == '0'){
            Message::where('id', $id)->update([
                'is_read'   =>  '1',
            ]);
        }

        $data = [
            'message'  =>  $message
        ];

        return view('technician.messages._outbox_message_body', $data);
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
