<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //Check if user id exists on users table
        $user = User::findorFail(Auth::id());

        //Determine designation of logged in user
        $designation = Auth::user()->designation;

        if(!empty($designation) && ($designation === '[SUPER_ADMIN_ROLE]' || $designation === '[ADMIN_ROLE]')){

            // return SuperAdmin/Admin dashboard route;
            return redirect()->route('admin.home');
        
        }elseif(!empty($designation) && ($designation === '[CLIENT_ROLE]')) {


            // return Client dashboard route;
            return redirect()->route('client.home');

        }elseif(!empty($designation) && ($designation === '[TECHNICIAN_ROLE]')) {
            	
            // return Technician dashboard route;
            return redirect()->route('technician.home');

        }elseif(!empty($designation) && ($designation === '[CSE_ROLE]')) {

            // return CSE dashboard route;
            return redirect()->route('cse.home');

        }else{
            Auth::logout(); //Unset user session

            return redirect()->route('logout')->with('error', 'User designation not found!'); 
        }

    }
}
