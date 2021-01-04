<?php

namespace App\Http\Controllers\CSE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Name;
use Auth;

class CSERequestController extends Controller
{
    public function onGoing(){

        $userServiceRequests = Auth::user()->requests()
                                ->orderBy('created_at', 'DESC')
                                ->get();

        $createdBy = Name::get();

        $data = [
            'userServiceRequests'   =>  $userServiceRequests,
            'createdBy'             =>  $createdBy,
        ];

        // echo '<pre>';
        // echo json_encode($data);
        // echo '<pre>';
        return view('cse.requests.ongoing', $data)->with('i');
    }
}


