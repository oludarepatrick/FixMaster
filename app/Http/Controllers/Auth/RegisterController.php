<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; 
use Route;

use App\Http\Controllers\MailController;
use App\Http\Controllers\PHPMailerController;
use App\Http\Controllers\EssentialsController;
use App\Http\Controllers\RecordActivityLogController;

use App\Models\User;
use App\Models\State;
use App\Models\Name;
use App\Models\Client;
use App\Models\Wallet;
use App\Models\Message;
use App\Models\LocationAndBrowserInfo;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){

        $states = State::select('id', 'name')->orderBy('name', 'ASC')->get();

        $data = ['states'   =>  $states];

        return view('auth.register', $data);

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    //Method to create a new user profile
    protected function registerClient(Request $request){

        // return $request;
        
        //Check if client has internect connected
        $this->isConnected = new EssentialsController();

        //Get location and browser information of client
        $this->locationAndBrowserInfo = new EssentialsController();

        // $ip = $request->getClientIp();
        //Comment this static test ip, and uncomment the above getClientIp()
        $ipAddress = '197.210.8.101';

        if($this->isConnected->internetConnection() == false){
            return back()->withInput()->with('error', 'You are currently offline. Please connect to the internet to continue.');
        }

        //Validate registration form has values
        $this->validateRequest();

        // DB::transaction(function () use ($request) {
            $token = sha1(time());

            $createClientProfile = User::create([
                'email'                         =>   $request->input('email'),
                'password'                      =>   Hash::make($request->input('password')),
                'email_verification_token'      =>   $token,
                'designation'                   =>   '[CLIENT_ROLE]',

                // 'is_email_verified'             =>  '1',
                // 'email_verified_at'             =>  \Carbon\Carbon::now(),
                // 'is_active'                     =>  '1',

            ]);

            $createClientRecord = Client::create([
                'user_id'                       =>   $createClientProfile->id,
                'state_id'                      =>   $request->input('state_id'),
                'lga_id'                        =>   $request->input('lga_id'),
                'first_name'                    =>   $request->input('first_name'),
                'middle_name'                   =>   $request->input('middle_name'),
                'last_name'                     =>   $request->input('last_name'),
                'phone_number'                  =>   $request->input('phone_number'), 
                'gender'                        =>   $request->input('gender'),
                'town'                          =>   $request->input('town'),
                'full_address'                  =>   $request->input('full_address'),
            ]);

            if($createClientProfile AND ($this->locationAndBrowserInfo->locationAndBrowserInfo($createClientProfile->id, $ipAddress) == true)){

                $clientName = $request->input('first_name').' '.$request->input('last_name');

                $mailBody = '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td align="center"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td align="center" valign="top" bgcolor="#66809b" background="https://fixmaster.com.ng/wp-content/uploads/2020/11/handyman.jpg" style="filter: brightness(95%); background-size: cover; background-position: top;" height="200" ><table class="col-600" width="600" height="100" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td height="30"></td></tr><tr><td align="center" style="line-height: 0px;"> <img style="display: block; line-height: 0px; font-size: 0px; border: 0px; line-height: 24px;" src="https://fixmaster.com.ng/wp-content/uploads/2020/11/fix-master-logo-straight.png" width="170" alt="FixMaster logo" /></td></tr><tr><td align="center" style="color: #fff; font-weight: bold; font-size: 25px; line-height: 24px;">When FixMaster repairs - you Relax!!!</td></tr><tr><td height="10"></td></tr><tr><td height="50"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align="center"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left: 20px; margin-right: 20px;"><tbody><tr><td height="35"></td></tr><tr><td align="center" style="font-size: 22px; font-weight: bold; color: #2a3a4b;">Welcome to FixMaster!</td></tr><tr><td height="10"></td></tr><tr><td align="center" style="font-size: 14px; color: #757575; line-height: 24px; font-weight: 300;"> Hello, <strong>'.$clientName.'</strong>, We are very excited to have you on FixMaster. Activate your account to book your first job and have the full experience.</td></tr></tbody></table></td></tr><tr><td height="5"></td></tr><tr><td align="center"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left: 20px; margin-right: 20px; "><tbody><tr><td height="10"></td></tr><tr><td><table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left"><tbody><tr><td height="20" style="font-size: 0; line-height: 0; border-collapse: collapse;"><p style="padding-left: 24px;">&nbsp;</p></td></tr></tbody></table><table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0"><tbody><tr><td height="30"></td></tr><tr><td height="15"></td></tr></tbody></table><table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left"><tbody><tr><td height="20" style="font-size: 0; line-height: 0; border-collapse: collapse;"><p style="padding-left: 24px;">&nbsp;</p></td></tr></tbody></table><tr><td align="center"><table align="center" class="col-600" width="600" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td align="center" bgcolor="#E97D1F"><table class="col-600" width="600" align="center" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td height="33"></td></tr><tr><td><table class="col1" width="183" border="0" align="left" cellpadding="0" cellspacing="0"><tbody><tr><td height="18"></td></tr><tr><td align="center"> <img style="display: block; line-height: 0px; font-size: 0px; border: 0px;" class="images_style" src="https://designmodo.com/demo/emailtemplate/images/icon-title.png" alt="img" width="156" height="136" /></td></tr></tbody></table><table class="col3_one" width="380" border="0" align="right" cellpadding="0" cellspacing="0"><tbody><tr align="left" valign="top"><td style="font-size: 20px; color: #fff; line-height: 30px; font-weight: bold;">Verify E-Mail!</td></tr><tr><td height="5"></td></tr><tr align="left" valign="top"><td style="font-size: 14px; color: #fff; line-height: 24px; font-weight: 300;">To verify your email, simply click the "Verify E-Mail" button.</td></tr><tr><td height="10"></td></tr><tr align="left" valign="top"><td><table class="button" style="border: 2px solid #fff;" bgcolor="#E97D1F" width="30%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td width="10"></td><td height="30" align="center" style="font-size: 13px; color: #ffffff;"> <a href="http://temp.homefix.ng/client-email-verify?token='.$token.'" style="color: #ffffff;">Verify E-Mail</a></td><td width="10"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td height="33"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left: 40px; margin-right: 20px; margin-top: 20px; font-size: 14px;"><tbody><tr><td>Thanks,</td></tr><tr><td>FixMaster Management</td></tr><tr><td><img class="CToWUd" src="http://temp.homefix.ng/assets/images/home-fix-logo-colored.png" alt="FixMaster Logo" width="70" /></td></tr><td>284B, Ajose Adeogun Street, Victoria Island, Lagos, Nigeria. 08132863878 | <a href="mailto:info@fixmaster.com.ng" target="_blank" rel="noopener">info@fixmaster.com.ng</a></td><td>&nbsp;</td><tr><td><hr /></td></tr><tr><td> If you&rsquo;re having trouble clicking the "Verify E-Mail" button, copy and paste the URL below into your web browser: <a href="http://temp.homefix.ng/client-email-verify?token='.$token.'" target="_blank">http://temp.homefix.ng/client-email-verify?token='.$token.'</a></td></tr></tbody></table></td></tr><tr><td align="center"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left: 20px; margin-right: 20px;"><tbody><tr><td align="center"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td height="50"></td></tr><tr><td align="right"><table class="col2" width="287" border="0" align="right" cellpadding="0" cellspacing="0"><tbody><tr><td align="center" style="line-height: 0px;"> <img style="display: block; line-height: 0px; font-size: 0px; border: 0px;" class="images_style" src="https://designmodo.com/demo/emailtemplate/images/icon-responsive.png" width="169" height="138" /></td></tr></tbody></table><table width="287" border="0" align="left" cellpadding="0" cellspacing="0" class="col2" style=""><tbody><tr><td align="center"><table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr align="left"><td style="font-size: 23px; color: #2a3b4c; line-height: 30px; font-weight: bold;">What we do?</td></tr><tr><td height="5"></td></tr><tr><td style="font-size: 14px; color: #7f8c8d; line-height: 24px; font-weight: 300;"> FixMaster is Nigeria’s Topmost maintenance service provider. We install service and repair all household and office appliances. We also provide maintenance and service facilities for all plumbing, electrical, security, interior decorations, carpentry, cleaning, and gardening services.</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align="center"><table align="center" width="100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td height="50"></td></tr><tr><td align="center" bgcolor="#34495e" background="https://designmodo.com/demo/emailtemplate/images/footer.jpg" height="185"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td height="25"></td></tr><tr><td align="center" style="font-size: 26px !important; font-weight: bold !important; color: #fff !important;">Follow us on social media</td></tr><tr><td height="25"></td></tr></tbody></table><table align="center" width="35%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td align="center" width="30%" style="vertical-align: top;"> <a href="#" target="_blank"> <img src="https://designmodo.com/demo/emailtemplate/images/icon-fb.png" /> </a></td><td align="center" class="margin" width="30%" style="vertical-align: top;"> <a href="#" target="_blank"> <img src="https://designmodo.com/demo/emailtemplate/images/icon-twitter.png" /> </a></td><td align="center" width="30%" style="vertical-align: top;"> <a href="#" target="_blank"> <img src="https://designmodo.com/demo/emailtemplate/images/icon-googleplus.png" /> </a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></td></tr></tbody></table></td></tr></tbody></table>';

                $subject = 'Welcome to FixMaster '.$clientName;

                PHPMailerController::sendMail($createClientProfile->email, $mailBody, $subject);

                // MailController::clientEmailVerification($createClientProfile->email, $createClientProfile->email_verification_token, $clientName);

                //Create new User record on `names` table
                Name::create([
                    'user_id'           =>  $createClientProfile->id,
                    'name'              =>  $clientName,
                ]);

                Wallet::create([
                    'user_id'   =>  $createClientProfile->id,
                    'wallet_id' =>  'WAL-'.$this->randomWalletId(8),
                ]);
                

                $body = '<p class="p1"><strong>Hello '.$clientName.',</strong></p><p class="p1"><strong>Welcome to Fix<span style="color: #E97D1F;">Master</span>! </strong>We&rsquo;re thrilled to see you <span class="s1">here</span>!</p><p class="p1">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class="p1">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class="p1">You can also find more of our guides in the <a href="/faq" target="_blank"> Frequently Asked Questions</a> section.</p><p class="p2">&nbsp;</p><p class="p1">Thanks,</p><p class="p1"><strong>FixMaster Management.</strong></p>';

                
                Message::create([
                    'sender_id'         =>  4, 
                    'recipient_id'      =>  $createClientProfile->id, 
                    'subject'           =>  'Welcome to FixMaster!', 
                    'body'              =>  $body, 
                    'is_read'           =>  '0'
                ]); 

                
                // return back()->with('success', 'Your account has been created. Please check your E-Mail for verification.');
                $data = [
                    'email'         => $createClientProfile->email,
                    'clientName'    =>  $clientName,
                ];

                //Record crurrenlty logged in user activity
                $this->addRecord = new RecordActivityLogController();
                $id = $createClientProfile->id;
                $type = 'Login';
                $severity = 'Informational';
                $actionUrl = Route::currentRouteAction();
                $controllerActionPath = URL::full();
                $message = $clientName.'('.$request->input('email').') account was registered successfully.';
                $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

                // return redirect()->route('login')->with('success', 'Dear '.$clientName.', your account has been created. Please login. Thanks.');

                return view('mail.client_email_verification', $data);
            }

        // }, 3);

        //Record crurrenlty logged in user activity
        $this->addRecord = new RecordActivityLogController();
        $id = '2';
        $type = 'Unauthorized';
        $severity = 'Informational';
        $actionUrl = Route::currentRouteAction();
        $controllerActionPath = URL::full();
        $message = 'An error occurred while '.$request->input('email').' was trying to register.';
        $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

        User::where('id', $createClientProfile->id)->forceDelete();

        return back()->with('error', 'Error occurred while trying to register. Please try again.');

    }

    /**
     * Validate user input fields
     */
    private function validateRequest(){
        return request()->validate([
            'state_id'                  =>   'required',
            'lga_id'                    =>   'required',
            'first_name'                =>   'required',
            'middle_name'               =>   '',
            'last_name'                 =>   'required',
            'email'                     =>   'required|email|unique:users,email', 
            'phone_number'              =>   'required|Numeric|unique:clients,phone_number', 
            'gender'                    =>   'required',
            'town'                      =>   'required',
            'password'                  =>   'required|min:8',
            'confirm_password'          =>   'required|same:password',
            'full_address'              =>   'required',
            'terms_and_conditions'      =>   'required|accepted',
        ]);
    }

    // This function will return  
    // A random string of specified length 
    public function randomWalletId($length_of_string) { 
            
        // sha1 the timstamps and returns substring 
        // of specified length 
        return strtoupper(substr(sha1(time()), 0, $length_of_string)); 
    } 

    public function verifyClientEmail(Request $request){

        $email_verification_token = $request->get('token');

        $user = User::select('id', 'email', 'is_email_verified')
        ->where(['email_verification_token' => $email_verification_token])->first();

        if($user->is_email_verified == 1){
            
            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = $user->id;
            $type = 'Login';
            $severity = 'Warning';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = $user->fullName->name.' was trying to re-verify '.$user->email.' with an expired E-Mail verification token('.$email_verification_token.')';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('login')->with('error', 'Your E-Mail has been verified already. Please login!');
        }

        if($user != null){

            // MailController::newClientDiscountMail($user->email, $user->fullName->name);
            
            $user->is_email_verified = '1';
            $user->email_verified_at = \Carbon\Carbon::now();
            $user->is_active = '1';
            $user->save();

            $mailBodyTwo = '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td align="center"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td align="center" valign="top" bgcolor="#66809b" background="https://fixmaster.com.ng/wp-content/uploads/2020/11/handyman.jpg" style="filter: brightness(95%); background-size: cover; background-position: top;" height="200" ><table class="col-600" width="600" height="100" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td height="30"></td></tr><tr><td align="center" style="line-height: 0px;"> <img style="display: block; line-height: 0px; font-size: 0px; border: 0px; line-height: 24px;" src="https://fixmaster.com.ng/wp-content/uploads/2020/11/fix-master-logo-straight.png" width="170" alt="FixMaster logo" /></td></tr><tr><td align="center" style="font-size: 25px; color: #fff; line-height: 24px; font-weight: bold;">When FixMaster repairs - you Relax!!!</td></tr><tr><td height="10"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align="center"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left: 20px; margin-right: 20px;"><tbody><tr><td height="35"></td></tr><tr><td align="center" style="font-size: 22px; font-weight: bold; color: #2a3a4b;">Congratulations! You have just earned a 5% discount on your first job booking</td></tr><tr><td height="10"></td></tr><tr><td align="" style="font-size: 14px; color: #757575; line-height: 24px; font-weight: 300;"><p>Hello <strong>'.$user->fullName->name.'</strong>, We are very excited you joined the most compelling community of FixMaster satisfied customers! As you already know, excellent quality service, rewards, and savings have always been a vital part of FixMaster\'s success.</p><p> Having said so, we constantly cater to our customers\' best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>For registering with FixMaster, you have been rewarded with a discount on your first job booking which entitles you to a 5% discount off your booking fee.</p><p><strong>PLEASE NOTE THAT THIS DISCOUNT IS ONLY APPLICABLE FOR YOUR FIRST JOB BOOKING</strong></p><p>Should you require further assistance, please do not hesitate to contact us immediately on <strong>08132863878</strong>. We are here to serve you; 24-hours, 7 days a week.</td></tr></tbody></table></td></tr><tr><td align="center"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td height="10"></td></tr><tr><td><table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left"><tbody><tr><td height="20" style="font-size: 0; line-height: 0; border-collapse: collapse;"><p style="padding-left: 24px;">&nbsp;</p></td></tr></tbody></table><table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0"><tbody><tr><td height="30"></td></tr><tr><td height="15"></td></tr></tbody></table><table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left"><tbody><tr><td height="20" style="font-size: 0; line-height: 0; border-collapse: collapse;"><p style="padding-left: 24px;">&nbsp;</p></td></tr></tbody></table><tbody><tr><td><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left: 40px; margin-right: 20px; margin-top: 20px; font-size: 14px"><tbody><tr><td>Thanks,</td></tr><tr><td>FixMaster Management</td></tr><tr><td><img class="CToWUd" src="http://temp.homefix.ng/assets/images/home-fix-logo-colored.png" alt="FixMaster Logo" width="70" /></td></tr><td>284B, Ajose Adeogun Street, Victoria Island, Lagos, Nigeria. 08132863878 | <a href="mailto:info@fixmaster.com.ng" target="_blank" rel="noopener">info@fixmaster.com.ng</a></td><td>&nbsp;</td></tbody></table></td></tr><tr><td align="center"><table align="center" width="100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td height="50"></td></tr><tr><td align="center" bgcolor="#34495e" background="https://designmodo.com/demo/emailtemplate/images/footer.jpg" height="185"><table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td height="25"></td></tr><tr><td align="center" style="font-size: 26px !important; font-weight: bold !important; color: #fff !important;">Follow us on social media</td></tr><tr><td height="25"></td></tr></tbody></table><table align="center" width="35%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td align="center" width="30%" style="vertical-align: top;"> <a href="#" target="_blank"> <img src="https://designmodo.com/demo/emailtemplate/images/icon-fb.png" /> </a></td><td align="center" class="margin" width="30%" style="vertical-align: top;"> <a href="#" target="_blank"> <img src="https://designmodo.com/demo/emailtemplate/images/icon-twitter.png" /> </a></td><td align="center" width="30%" style="vertical-align: top;"> <a href="#" target="_blank"> <img src="https://designmodo.com/demo/emailtemplate/images/icon-googleplus.png" /> </a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></td></tr></tbody></table></td></tr></tbody></table>';

            $subject = 'Congratulations! '.$user->fullName->name.' You have earned a discount';
            PHPMailerController::sendMail($user->email, $mailBodyTwo, $subject);

            $body = '<h1>Congratulations! You have just earned a 5% discount on your first job booking</h1><p>We are very excited you joined the most compelling community of FixMaster satisfied customers! As you already know, excellent quality service, rewards, and savings have always been a vital part of FixMaster\'s success.</p><p> Having said so, we constantly cater to our customers\' best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>For registering with FixMaster, you have been rewarded with a discount on your first job booking which entitles you to a 5% discount off your booking fee.</p><p><strong>PLEASE NOTE THAT THIS DISCOUNT IS ONLY APPLICABLE FOR YOUR FIRST JOB BOOKING</strong></p><p>Should you require further assistance, please do not hesitate to contact us immediately on <strong>08132863878</strong>. We are here to serve you; 24-hours, 7 days a week.</p><p>&nbsp;</p><p>Yours Faithfully,</p><p>FixMaster management</p>';

            Message::create([
                'sender_id'         =>  4, 
                'recipient_id'      =>  $user->id, 
                'subject'           =>  'Congratulations! You have earned a discount', 
                'body'              =>  $body, 
                'is_read'           =>  '0'
            ]); 

            //Record crurrenlty logged in user activity
            $this->addRecord = new RecordActivityLogController();
            $id = $user->id;
            $type = 'Login';
            $severity = 'Informational';
            $actionUrl = Route::currentRouteAction();
            $controllerActionPath = URL::full();
            $message = $user->fullName->name.' successsfully verified '.$user->email.' with E-Mail verification token('.$email_verification_token.')';
            $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

            return redirect()->route('login')->with('success', 'Your E-Mail is verified. Please login!');
        }

        //Record crurrenlty logged in user activity
        $this->addRecord = new RecordActivityLogController();
        $id = $user->id;
        $type = 'Login';
        $severity = 'Warning';
        $actionUrl = Route::currentRouteAction();
        $controllerActionPath = URL::full();
        $message = $user->fullName->name.' was trying to verify '.$user->email.' with an invalid E-Mail verification token';
        $this->addRecord->createMessage($id, $type, $severity, $actionUrl, $controllerActionPath, $message);

        return redirect()->route('login')->with('error', 'Invalid E-Mail Verification token!');
    }
    
}
