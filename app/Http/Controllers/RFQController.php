<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Models\ToolsInventory;
use App\Models\RFQ;


class RFQController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){

        $rfqs = RFQ::get();

        $data = [
            'rfqs'   =>  $rfqs,
        ];

        return view('admin.rfq', $data)->with('i');
    }

    public function rfqDetails($id){

        $rfqDetails = RFQ::findOrFail($id);
        
        $data = [
            'rfqDetails'    =>  $rfqDetails,
        ];

        return view('admin._rfq_details', $data)->with('i');

    }
}
