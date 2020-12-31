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
use App\Models\Message;

class CSEMessageController extends Controller
{

    public function __construct() {
        $this->middleware('auth:web');
    }

    // public function edititem($id){
    //     $data=Item::with('categoryitem')->find($id);
    //     return $data;
    //   }

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
        foreach($ongoingJob as $item){
            $data = [
                 $item->user->fullName->name,
                 $item->admin->first_name.' '.$item->admin->last_name,
                 $item->technician->first_name.' '.$item->technician->last_name,
                //  $item->job_reference
                //  $item->job_reference
            ];
        };
        return $data;

       }

    // public function getUserAssigned(Request $request){
    //     try {
    //         $hello = $request->data;
    //         return $hello;
    //     //     $cse = CSE::where('user_id', Auth::id())->first();

    //     //     $serviceRequests = $cse->requests;

    //     //     $ongoingJob = $cse->requests()
    //     //                     ->where('service_request_status_id', '>', '3')
    //     //                     ->where('id', '=', $request->data)
    //     //                     ->get();

    //     //     // return $ongoingJobs;

    //     //     foreach($ongoingJob as $item){
    //     //         $clientName[] = $item->user->fullName->name;
    //     //         $adminName[] = $item->admin->first_name.' '.$item->admin->last_name;
    //     //         $technicianName[] = $item->technician->first_name.' '.$item->technician->last_name;
    //     //         $jobReference[] =$item->job_reference;                
    //     //     };
    //     //     return [$clientName,  $adminName, $technicianName, $jobReference];
            
            
    //       } catch (\Throwable $e) {
    //         return back()->with('error','An error occurred while tyring to update your password. Try again!');
    //     }
    // }

    

    public function saveMessageData(Request $request){
        // return $request;
        $validatedData = $request->validate([            
            'selectedUser'  => 'required|max:255',
            'jobReference' => 'required|max:255',
            'subject'   => 'required|max:255',
            'message'   => 'required',
          ]);
          
          $message = new Message;
          $message->sender_id  = Auth::id();
          $message->recipient_id = $request->selectedReciever;
          $message->subject = $request->subject; 
          $message->body = $request->message;
          $message->is_read = 0;
          $message->created_at = date('Y-m-d');

        //   $message->save(); 
          echo $message;
          return;

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
