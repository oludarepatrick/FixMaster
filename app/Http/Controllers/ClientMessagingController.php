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
       
        return view('client.messages');
    }

    public function sendMessage(Request $request){
        return $request;
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
            'body'          =>   $request->body,
        ]);

        if($sendMessage){

            //Get recipent's full name
            $recipientName = Name::findOrFail($request->recipient_id);
            $recipientName = $recipientName->name;

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = Auth::id();
            $type = 'Others';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = Auth::user()->fullName->name.' sent a message to '.$recipientName;
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('admin.requests_ongoing')->with('success', 'Message was sent to '.$recipientName);

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
