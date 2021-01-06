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

        $receivedPayments = ReceivedPayment::get();

        // return $receivedPayments;
        
        $data = [
            'receivedPayments'  =>  $receivedPayments,
        ];

        return view('admin.payments.received', $data)->with('i');
    }
}
