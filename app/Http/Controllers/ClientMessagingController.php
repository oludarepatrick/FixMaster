<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RecordActivityLogController;
use Illuminate\Support\Facades\URL; 
use Illuminate\Support\Facades\Hash;

use Route;
use Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Name;

class ClientMessagingController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){
       
        $receivedMessages =  Auth::user()->receivedMessages()->orderBy('created_at', 'DESC')->get()
        ->groupBy(function ($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        });

        $sentMessages =  Auth::user()->sentMessages()->orderBy('created_at', 'DESC')->get()
        ->groupBy(function ($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        });

        $data = [
            'receivedMessages'  =>  $receivedMessages,
            'sentMessages'      =>  $sentMessages,
        ];

        // return $sentMessages;

        return view('client.messages', $data);
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

        return view('client._inbox_message_body', $data);
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

        return view('client._outbox_message_body', $data);
    }

    public function sendMessage(Request $request){
        //Validat user input fields
        $request->validate([
            'recipient_id'  =>   'required',
            'subject'       =>   'required',
            'message'       =>   'required',
        ]);

        //Create record on `messages` table
        $sendMessage = Message::create([
            'sender_id'     =>  Auth::id(),
            'recipient_id'  =>   $request->recipient_id,
            'subject'       =>   $request->subject,
            'body'          =>   $request->message,
        ]);

        if($sendMessage){

            //Get recipent's full name
            $recipientName = Name::where('user_id', $request->recipient_id)->first()->name;
            // $recipientName = $recipientName->name;

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' sent a message to '.$recipientName;
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('client.messages')->with('success', 'Message was sent to '.$recipientName);

        }else{

            //Record Unauthorized user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Errors';
            $severity = 'Error';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = 'An error occurred while '.Auth::user()->fullName->name.' was trying to send a message to '.$recipientName;

            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return back()->with('error', 'An error occurred while trying to send a message');

        }

        return back()->withInput();
    }
}

