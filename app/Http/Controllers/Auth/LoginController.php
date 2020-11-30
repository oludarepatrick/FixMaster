<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Name;
use App\Models\ActivityLog;
use App\Http\Controllers\ActivityLogController;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // protected function redirectTo(){
    //     // return Request::session()->get('url.intended') ?? '/home';
    //     return redirect()->guest(route('login'));
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else{
            \Session::put('url.intended',URL::previous());
            return view('auth.login');
        }
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     //check if the previous page route name is 'congresses.registration'
    //     if(Route::getRoutes()->match(Request::create(\URL::previous()))->getName() == 'congresses.registration') {
    //         //redirect to previous page with parameters
    //         return redirect(Request::create(\URL::previous())->getRequestUri());
    //     }
    //     return redirect()->intended($this->redirectTo);

    // }

    //This function will validate a user login credentials
    public function verifyCredentials(Request $request){
        //Check if both the email and password field are not empty with laravel validate function
        $this->validate($request, [
            'email'     =>  'required|email',
            'password'  =>  'required|min:8'
        ]);

        $rememberMe = $request->has('remember_me') ? true : false; 

        //Push values from email and password input fields into an array 
        $userCredentials = array(
            'email'             =>  $request->get('email'),
            'password'          =>  $request->get('password'),
        );

        if(Auth::attempt($userCredentials, $rememberMe)){

            $user = User::findorFail(Auth::id());

            $isActive = Auth::user()->is_active;

            // return $user->fullName->name;

            if($isActive == 0){
                Auth::logout(); //Unset user session

                //Return error message once email is not verified 
                return back()->with('error','Your account has been temporarily deactivated. Please contact FixMaster Administrator.');
            }

            //Validate user email is verified
            if(Auth::user()->is_email_verified == 1 && $isActive == 1){

                //Increment login count
                User::where('id', Auth::id())->increment('login_count', 1);

                //Record user login time
                $this->message = new ActivityLogController();
                $message = $user->fullName->name.' logged in at '.\Carbon\Carbon::parse(now() , 'UTC')->isoFormat('LL h:mm:ssa');
                $this->message->createMessage($message, $type='Others');

                //redirect User to check for more constraints  
                return \Redirect::to(\Session::get('url.intended'));
                // return \Redirect::intended();
                // return redirect()->route('home');
                
            }else{
                Auth::logout(); //Unset user session

                //Return error message once email is not verified 
                return back()->with('error','Please verify your E-Mail Address before login.');
            }                         
            
        }else{
            //Record user login time
            // $this->message = new ActivityLogController();
            // $message = 'Intrudeer ALert at '.\Carbon\Carbon::parse(now() , 'UTC')->isoFormat('LL h:mm:ssa').' with E-Mail: '.$request->input('email').' and Password: '.$request->input('password');
            // $this->message->createMessage($message, $type='Others');

            Auth::logout(); //Unset user session

            //Return error message once authentication fails
            return back()->with('error','These credentials do not match our records.');
        }
    }

    public function logout(){
        //Record user logout time
        if(!empty(Auth::user())){
            $this->message = new ActivityLogController();
            $message = Auth::user()->fullName->name.' logged out at '.\Carbon\Carbon::parse(now() , 'UTC')->isoFormat('LL h:mm:ssa');
            $this->message->createMessage($message, $type='Others');
        }
        
        Auth::logout(); //Unset user session
        //Redirect back to home page with logout success message
        return redirect()->route('login')->with('success', 'You are logged out!'); 
    }

}
