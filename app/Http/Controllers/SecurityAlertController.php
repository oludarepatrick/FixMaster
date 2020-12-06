<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecurityAlert;
use Auth;

class SecurityAlertController extends Controller
{

    public function index(){
        // $activityLogs = ActivityLog::orderBy('created_at', 'DESC')->paginate(20);
        $activityLogs = SecurityAlert::orderBy('created_at', 'DESC')->get();

        $data = [
            'activityLogs'  =>  $activityLogs,
        ];

        // return view('admin.activity_log', $data)->with('i', (request()->input('page', 1) -1)*20);
        return view('admin.activity_log', $data)->with('i');
    }

    public function createMessage($message, $type){
        
        // PHP program to get IP address of client 
        $ipAdress = $_SERVER['REMOTE_ADDR']; 

        // PHP code to get the MAC address of Client 
        $macAddress = exec('getmac'); 
        // Storing 'getmac' value in $MAC 
        $macAddress = strtok($MAC, ' '); 

        SecurityAlert::create([
            'user_id'   =>  Auth::id(),
            'type'      =>  $type,
            'message'   =>  $message,
        ]);
    }
}
