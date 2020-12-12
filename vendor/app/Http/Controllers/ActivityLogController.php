<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Auth;

class ActivityLogController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){
        // $activityLogs = ActivityLog::orderBy('created_at', 'DESC')->paginate(20);
        $activityLogs = ActivityLog::orderBy('created_at', 'DESC')->get();

        $data = [
            'activityLogs'  =>  $activityLogs,
        ];

        // return view('admin.activity_log', $data)->with('i', (request()->input('page', 1) -1)*20);
        return view('admin.activity_log', $data)->with('i');
    }

    public function createMessage($message, $type){
        
        ActivityLog::create([
            'user_id'   =>  Auth::id(),
            'type'      =>  $type,
            'message'   =>  $message,
        ]);
    }
}
