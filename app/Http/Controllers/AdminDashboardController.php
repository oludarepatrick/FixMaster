<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminDashboardController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function index(){
        
        return view('admin.home');
    }
}
