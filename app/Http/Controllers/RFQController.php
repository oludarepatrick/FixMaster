<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL; 
use Route;

use App\Http\Controllers\MailController;
use App\Http\Controllers\EssentialsController;
use App\Http\Controllers\RecordActivityLogController;

use Auth;
use App\Models\User;
use App\Models\Client;
use App\Models\CSE;
use App\Models\Technician;
use App\Models\ServiceRequest;
use App\Models\ServiceRequestDetail;
use App\Models\ServiceRequestProgress;
use App\Models\ServiceRequestStatus;
use App\Models\Category;
use App\Models\Service;
use App\Models\Name;
use App\Models\ToolsInventory;
use App\Models\RFQ;
use App\Models\RFQBatch;
use App\Models\RFQSupplier;
use App\Models\ToolsRequest;
use App\Models\ToolsRequestBatch;

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
        
        // return $id;

        $data = [
            'rfqDetails'    =>  $rfqDetails,
        ];

        return view('admin._rfq_details', $data)->with('i');

    }
}
