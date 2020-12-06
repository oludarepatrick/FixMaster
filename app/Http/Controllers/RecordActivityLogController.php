<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class RecordActivityLogController extends Controller
{
    public function createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message){
        
        ActivityLog::create([
            'user_id'                   =>  $id,
            'ip_address'                =>  $_SERVER['REMOTE_ADDR'],
            'type'                      =>  $type,
            'severity'                  =>  $severity,
            'action_url'                =>  $actionUrl, 
            'controller_action_path'    =>  $controllerActionPath, 
            'message'                   =>  $message,
        ]);
    }

}
