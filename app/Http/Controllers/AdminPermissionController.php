<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\AdminPermission;

class AdminPermissionController extends Controller
{
    /**
     * This method will redirect users back to the login page if not properly authenticated
     * @return void
     */  
    public function __construct() {
        $this->middleware('auth:web');
    }

    public function adminRole(Request $request, $user_id){
        // return $user_id;
        
        if($request->has('administrators')){
            $administrators = 1;
        }else{
            $administrators = 0;
        }

        if($request->has('clients')){
            $clients = 1;
        }else{
            $clients = 0;
        }

        if($request->has('cses')){
            $cses = 1;
        }else{
            $cses = 0;
        }

        if($request->has('location_request')){
            $location_request = 1;
        }else{
            $location_request = 0;
        }

        if($request->has('payments')){
            $payments = 1;
        }else{
            $payments = 0;
        }

        if($request->has('ratings')){
            $ratings = 1;
        }else{
            $ratings = 0;
        }

        if($request->has('requests')){
            $requests = 1;
        }else{
            $requests = 0;
        }

        if($request->has('rfqs')){
            $rfqs = 1;
        }else{
            $rfqs = 0;
        }

        if($request->has('service_categories')){
            $service_categories = 1;
        }else{
            $service_categories = 0;
        }

        if($request->has('technicians')){
            $technicians = 1;
        }else{
            $technicians = 0;
        }

        if($request->has('tools')){
            $tools = 1;
        }else{
            $tools = 0;
        }

        if($request->has('utilities')){
            $utilities = 1;
        }else{
            $utilities = 0;
        }

        $createAdminPermissionRecord = AdminPermission::create([
            'user_id'               =>  $user_id, 
            'administrators'        =>  $administrators, 
            'clients'               =>  $clients, 
            'cses'                  =>  $cses, 
            'location_request'      =>  $location_request, 
            'payments'              =>  $payments, 
            'ratings'               =>  $ratings, 
            'requests'              =>  $requests, 
            'rfqs'                  =>  $rfqs, 
            'service_categories'    =>  $service_categories, 
            'technicians'           =>  $technicians, 
            'tools'                 =>  $tools, 
            'utilities'             =>  $utilities,
        ]);

        if($createAdminPermissionRecord){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function updateAdminRole(Request $request, $id){
        
        if($request->has('administrators')){
            $administrators = '1';
        }else{
            $administrators = '0';
        }

        if($request->has('clients')){
            $clients = '1';
        }else{
            $clients = '0';
        }

        if($request->has('cses')){
            $cses = '1';
        }else{
            $cses = '0';
        }

        if($request->has('location_request')){
            $location_request = '1';
        }else{
            $location_request = '0';
        }

        if($request->has('payments')){
            $payments = '1';
        }else{
            $payments = '0';
        }

        if($request->has('ratings')){
            $ratings = '1';
        }else{
            $ratings = '0';
        }

        if($request->has('requests')){
            $requests = '1';
        }else{
            $requests = '0';
        }

        if($request->has('rfqs')){
            $rfqs = '1';
        }else{
            $rfqs = '0';
        }

        if($request->has('service_categories')){
            $service_categories = '1';
        }else{
            $service_categories = '0';
        }

        if($request->has('technicians')){
            $technicians = '1';
        }else{
            $technicians = '0';
        }

        if($request->has('tools')){
            $tools = '1';
        }else{
            $tools = '0';
        }

        if($request->has('utilities')){
            $utilities = '1';
        }else{
            $utilities = '0';
        }

        $updateAdminPermissionRecord = AdminPermission::where('user_id', $id)->update([
            'administrators'        =>  $administrators, 
            'clients'               =>  $clients, 
            'cses'                  =>  $cses, 
            'location_request'      =>  $location_request, 
            'payments'              =>  $payments, 
            'ratings'               =>  $ratings, 
            'requests'              =>  $requests, 
            'rfqs'                  =>  $rfqs, 
            'service_categories'    =>  $service_categories, 
            'technicians'           =>  $technicians, 
            'tools'                 =>  $tools, 
            'utilities'             =>  $utilities,
        ]);

        if($updateAdminPermissionRecord){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function superAdminRole($user_id){

        $createAdminPermissionRecord = AdminPermission::create([
            'user_id'               =>  $user_id, 
            'administrators'        =>  '1', 
            'clients'               =>  '1', 
            'cses'                  =>  '1', 
            'location_request'      =>  '1', 
            'payments'              =>  '1', 
            'ratings'               =>  '1', 
            'requests'              =>  '1', 
            'rfqs'                  =>  '1', 
            'service_categories'    =>  '1', 
            'technicians'           =>  '1', 
            'tools'                 =>  '1', 
            'utilities'             =>  '1',
        ]);

        if($createAdminPermissionRecord){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function updateSuperAdminRole($id){

        $updateAdminPermissionRecord = AdminPermission::where('user_id', $id)->update([
            'administrators'        =>  '1', 
            'clients'               =>  '1', 
            'cses'                  =>  '1', 
            'location_request'      =>  '1', 
            'payments'              =>  '1', 
            'ratings'               =>  '1', 
            'requests'              =>  '1', 
            'rfqs'                  =>  '1', 
            'service_categories'    =>  '1', 
            'technicians'           =>  '1', 
            'tools'                 =>  '1', 
            'utilities'             =>  '1',
        ]);

        if($updateAdminPermissionRecord){
            return 'true';
        }else{
            return 'false';
        }
    }
}
