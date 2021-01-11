<?php

namespace App\Http\Controllers\CSE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisbursedPayment;
use Auth;

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
        $receivedPayments = DisbursedPayment::orderBy('created_at','DESC')
                            ->where('user_id', Auth::id())
                            ->get();
        $data = [
            'receivedPayments' => $receivedPayments,
        ];
        return view('cse.payments.received', $data)->with('i');
    }
}
