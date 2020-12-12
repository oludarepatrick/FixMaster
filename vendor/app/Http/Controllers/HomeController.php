<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

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
            // return $designation;
            return redirect()->route('admin.home');

        }else{
            Auth::logout(); //Unset user session

            return redirect()->route('logout')->with('error', 'User designation not found!'); 
        }

    }
}
