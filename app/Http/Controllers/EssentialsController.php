<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

use Auth;
use App\Models\User;
use App\Models\State;
use App\Models\ToolsInventory;
use App\Models\LocationAndBrowserInfo;
use App\Models\Message;
use App\Http\Controllers\MailController;

class EssentialsController extends Controller
{
    public function internetConnection()
    {
        $host_name = 'www.google.com';
        $port_no = '80';

        $isConnected = (bool)@fsockopen($host_name, $port_no, $err_no, $err_str, 10);
        if ($isConnected) {
            // echo 'You are connected to internet.';
            $isConnected = true;
        } else {
            // echo 'Sorry! You are offline.';
            $isConnected = false;
        }

        return $isConnected;

    }

    public function locationAndBrowserInfo($userId, $ipAddress){

	    // $ip = '66.102.0.0' //Test stattic ip;

	    $ip = $ipAddress;
        $geoLocationInfo = \Location::get($ip);

        $agent = new Agent();
        $browser = $agent->browser();
        $platform = $agent->platform();
        $languages = implode(', ', $agent->languages());

        // echo  'Browser Name: '. $browser.'<br>';
        // echo  'Browser Version: '. Agent::version($browser).'<br>';
        // echo  'User Operating System: '. Agent::platform().'<br>';
        // echo  'User Operating Version: '. Agent::version($platform).'<br>';
        // return response()->json(Agent::languages());

        $userGeoLocationInformation = LocationAndBrowserInfo::create([
            'user_id'                               =>  $userId, 
            'ip'                                    =>  $ip, 
            'country_name'                          =>  $geoLocationInfo->countryName, 
            'country_code'                          =>  $geoLocationInfo->countryCode, 
            'region_code'                           =>  $geoLocationInfo->regionCode, 
            'region_name'                           =>  $geoLocationInfo->regionName, 
            'city_name'                             =>  $geoLocationInfo->cityName, 
            'zip_code'                              =>  $geoLocationInfo->zipCode, 
            'iso_code'                              =>  $geoLocationInfo->isoCode, 
            'postal_code'                           =>  $geoLocationInfo->postalCode, 
            'latitude'                              =>  $geoLocationInfo->latitude, 
            'longitude'                             =>  $geoLocationInfo->longitude, 
            'metro_code'                            =>  $geoLocationInfo->metroCode, 
            'area_code'                             =>  $geoLocationInfo->areaCode, 
            'browser_name'                          =>  $browser, 
            'browser_version'                       =>  $agent->version($browser), 
            'device_operating_system'               =>  $platform, 
            'device_operating_system_version'       =>  $agent->version($platform), 
            'languages'                             =>  $languages,
        ]);

        if($userGeoLocationInformation){
            return true;
        }
    }

    public function lgasList(Request $request){
        if($request->ajax()){

            $stateId = $request->get('state_id');

            $stateExists = State::findOrFail($stateId);

            $lgas =  $stateExists->lgas;

            $optionValue = '';
            $optionValue .= "<option value='' selected>Select L.G.A</option>";
            foreach ($lgas as $lga ){

                $optionValue .= "<option value='$lga->id' {{ old('lga_id') == $lga->id ? 'selected' : ''}}>$lga->name</option>";
            }

            $data = array(
                'lgaList' => $optionValue
            );

        }

        return response()->json($data);

    }

    public function getAvailableToolQuantity(Request $request){
        if($request->ajax()){
            $toolId = $request->get('tool_id');

            $toolExists = ToolsInventory::findOrFail($toolId);

            $availableQuantity =  $toolExists->available;

            return $availableQuantity;
        }
    }

    // This function will return  
    // A random string of specified length 
    public function randomStringGenerator($length_of_string) { 
            
        // sha1 the timstamps and returns substring 
        // of specified length 
        return strtoupper(substr(sha1(time()), 0, $length_of_string)); 
    } 

    public function successServiceRequestMessage($jobReference, $securityCode, $serviceName, $categoryName, $amount, $serviceFeeName, $timestamp){

        $body = '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>'.$jobReference.'</p><p><strong>Service: </strong>'.$serviceName.'('.$categoryName.')</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦'.number_format($amount).'('.$serviceFeeName.')</p><p><strong>Date & Time:</strong> '.$timestamp.'</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>';

        Message::create([
            'sender_id'         =>  4, 
            'recipient_id'      =>  Auth::id(), 
            'subject'           =>  'Service Request('.$jobReference.')', 
            'body'              =>  $body, 
            'is_read'           =>  '0'
        ]); 
    }

    public function cseWelcomeMessage($cseName, $cseId, $email, $password){

        $body = '<h1>Welcome to FixMaster, '.$cseName.'!</h1><p>We are very excited you joined the most compelling community of FixMaster to satisfy customer\'s need.</p><p>As a <strong>Client Service Executive</strong>(CSE) you are expected to deliver excellent quality service which has always been a vital part of FixMaster\'s success.</p><p>Having said so, we constantly cater to our customer\'s best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>Remember to change your password to a more convenient one asides the one given to you by FixMaster Admin.</p><p><span style="text-decoration: underline;"><strong>Login Credentials</strong></span></p><p><strong>E-Mail</strong>: '.$email.'</p><p><strong>Password:</strong> '.$password.'</p><p>&nbsp;</p><p>Yours Faithfully,</p><p>FixMaster management</p>';

        Message::create([
            'sender_id'         =>  4, 
            'recipient_id'      =>  $cseId, 
            'subject'           =>  'Welcome to FixMaster!', 
            'body'              =>  $body, 
            'is_read'           =>  '0'
        ]); 
    }

    public function technicianWelcomeMessage($technicianName, $technicianId, $email, $password){

        $body = '<h1>Welcome to FixMaster, '.$technicianName.'!</h1><p>We are very excited you joined the most compelling community of FixMaster to satisfy customer\'s need.</p><p>As a <strong>Technician</strong> you will be assigned to jobs and you are expected to deliver excellent quality service which has always been a vital part of FixMaster\'s success.</p><p>Having said so, we constantly cater to our customer\'s best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>Remember to change your password to a more convenient one asides the one given to you by FixMaster Admin.</p><p><span style="text-decoration: underline;"><strong>Login Credentials</strong></span></p><p><strong>E-Mail</strong>: '.$email.'</p><p><strong>Password:</strong> '.$password.'</p><p>&nbsp;</p><p>Yours Faithfully,</p><p>FixMaster management</p>';

        Message::create([
            'sender_id'         =>  4, 
            'recipient_id'      =>  $technicianId, 
            'subject'           =>  'Welcome to FixMaster!', 
            'body'              =>  $body, 
            'is_read'           =>  '0'
        ]); 
    }

    public function assignCseMessage($cseName, $cseId, $jobReference){
        $body = '<p><strong>Hello '.$cseName.'</strong>, you have been assigned to <strong>'.$jobReference.'</strong> job. Kindly proceed to critically reviewing the client\'s request.</p><br /><p>Thanks,<br />FixMaster Management</p>';

        Message::create([
            'sender_id'         =>  4, 
            'recipient_id'      =>  $cseId, 
            'subject'           =>  'New Job('.$jobReference.') Assignment', 
            'body'              =>  $body, 
            'is_read'           =>  '0'
        ]); 
    }

    public function assignTechnicianMessage($technicianName, $technicianId, $cseName, $jobReference){

        $body = '<p><strong>'.$technicianName.'</strong>, you have been assigned to <strong>'.$jobReference.'</strong> job. Kindly proceed to reviewing the client\'s request and await further instructions from the <strong>'.$cseName.'</strong>(CSE) assigned to you.</p><br /><p>Thanks,<br />FixMaster Management</p>';

        Message::create([
            'sender_id'         =>  4, 
            'recipient_id'      =>  $technicianId, 
            'subject'           =>  'New Job('.$jobReference.') Assignment', 
            'body'              =>  $body, 
            'is_read'           =>  '0'
        ]); 
    }

    public function approveToolRequest($requesterName, $requesterId, $jobReference, $batchNumber){

        $body = '<p>Hello <strong>'.$requesterName.'</strong>, your Tool request(<strong>'.$batchNumber.'</strong>) for Job(<strong>'.$jobReference.'</strong>) has been approved.&nbsp;</p><p>&nbsp;</p><div><div>Thanks,</div><div>FixMaster Management</div></div>';

        Message::create([
            'sender_id'         =>  4, 
            'recipient_id'      =>  $requesterId, 
            'subject'           =>  'Tool Request Approval for Job('.$jobReference.')', 
            'body'              =>  $body, 
            'is_read'           =>  '0'
        ]); 
    }

    public function declineToolRequest($requesterName, $requesterId, $jobReference, $batchNumber){

        $body = '<p>Hello <strong>'.$requesterName.'</strong>, we are sorry, but your Tool request(<strong>'.$batchNumber.'</strong>) for Job(<strong>'.$jobReference.'</strong>) was declined.&nbsp;</p><p>&nbsp;</p><div><div>Thanks,</div><div>FixMaster Management</div></div>';

        Message::create([
            'sender_id'         =>  4, 
            'recipient_id'      =>  $requesterId, 
            'subject'           =>  'Tool Request for Job('.$jobReference.') has been declined', 
            'body'              =>  $body, 
            'is_read'           =>  '0'
        ]); 
    }
}
