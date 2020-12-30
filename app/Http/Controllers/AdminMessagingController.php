<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\RecordActivityLogController;
use Illuminate\Support\Facades\URL; 
use Illuminate\Support\Facades\Hash;

use Route;
use Auth;
use App\Models\User;
use App\Models\Message;

class AdminMessagingController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function inbox(){

        // $messages = Message::orderBy('created_at', 'DESC')->get()
        // ->groupBy(function ($val) {
        //     return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        // });
        
        $messages =  Auth::user()->receivedMessages()->orderBy('created_at', 'DESC')->get()
        ->groupBy(function ($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        });

        $data = [
            'messages'  =>  $messages
        ];

        return view('admin.messages.inbox', $data);
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

        return view('admin.messages._inbox_message_body', $data);
    }

    public function outbox(){

        // $messages = Message::orderBy('created_at', 'DESC')->get()
        // ->groupBy(function ($val) {
        //     return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        // });
        
        $messages =  Auth::user()->sentMessages()->orderBy('created_at', 'DESC')->get()
        ->groupBy(function ($val) {
            return \Carbon\Carbon::parse($val->created_at)->format('l d, F Y');
        });

        $data = [
            'messages'  =>  $messages
        ];

        return view('admin.messages.outbox', $data);
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

        return view('admin.messages._outbox_message_body', $data);
    }
}
