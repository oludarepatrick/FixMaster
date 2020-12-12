<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

use App\Models\User;
use App\Models\State;
use App\Models\LocationAndBrowserInfo;

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
}
