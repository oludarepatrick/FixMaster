<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Static Frontend pages routes
Route::view('/',           			        'page.homepage')->name('page.home');
Route::view('/about', 				        'page.about')->name('page.about');
Route::view('/how-it-works', 		        'page.how_it_works')->name('page.how_it_works');
Route::view('/why-home-fix', 		        'page.why_home_fix')->name('page.why_home_fix');
Route::view('/join-us', 			        'page.careers')->name('page.careers');
Route::view('/faq', 			            'page.faq')->name('page.faq');
Route::view('/contact-us', 			        'page.contact')->name('page.contact');
Route::view('/services', 			        'page.services')->name('page.services');
Route::view('/service-details', 			'page.service_details')->name('page.services_details');
// Route::view('/register-client', 			        'page.register')->name('page.register');
// Route::view('/login-client', 			            'page.login')->name('page.login');

Route::prefix('client')->group(function () {
    Route::view('/', 			            'client.home')->name('client.home');
    Route::view('/settings', 	            'client.settings')->name('client.settings');
    Route::view('/messages', 	            'client.messages')->name('client.messages');
    Route::view('/services', 	            'client.services')->name('client.services');
    Route::view('/service/custom', 	        'client.service_custom')->name('client.service_custom');
    Route::view('/services/quote', 	        'client.service_quote')->name('client.service_quote');
    Route::view('/requests', 	            'client.requests')->name('client.requests');
    Route::view('/requests/details', 	    'client.request_details')->name('client.request_details');
    Route::view('/requests/invoice', 	    'client.request_invoice')->name('client.request_invoice');
    Route::view('/payments', 	            'client.payments')->name('client.payments');
    Route::view('/wallet', 	                'client.wallet')->name('client.wallet');
    Route::view('/technician', 	            'client.technician_profile')->name('client.technician_profile');

});

Route::prefix('cse')->group(function () {
    Route::view('/', 			                'cse.home')->name('cse.home');
    Route::view('/requests', 	                'cse.requests')->name('cse.requests');
    Route::view('/requests/details/new', 	    'cse.request_details')->name('cse.request_details');
    Route::view('/requests/details/ongoing', 	'cse.request_ongoing_details')->name('cse.request_ongoing_details');
    Route::view('/requests/details/completed', 	'cse.request_completed_details')->name('cse.request_completed_details');
    Route::view('/requests/ongoing', 	        'cse.requests_ongoing')->name('cse.requests_ongoing');
    Route::view('/requests/completed', 	        'cse.requests_completed')->name('cse.requests_completed');
    Route::view('/requests/cancelled', 	        'cse.requests_cancelled')->name('cse.requests_cancelled');
    Route::view('/technicians', 	            'cse.technicians')->name('cse.technicians');
    Route::view('/technicians/profile', 	    'cse.technicians_profile')->name('cse.technicians_profile');
    Route::view('/profile', 	                'cse.view_profile')->name('cse.view_profile');
    Route::view('/profile/edit', 	            'cse.edit_profile')->name('cse.edit_profile');
    Route::view('/payments', 	                'cse.payments')->name('cse.payments');
    Route::view('/messages', 	                'cse.messages')->name('cse.messages');
    Route::view('/messages/sent', 	            'cse.messages_sent')->name('cse.messages_sent');
});

Route::prefix('technician')->group(function () {
    Route::name('technician.')->group(function () {
        Route::view('/', 			                'technician.home')->name('home');
        Route::view('/requests', 	                'technician.requests')->name('requests');
        Route::view('/requests/details/', 	        'technician.request_details')->name('request_details');
        Route::view('/profile', 	                'technician.view_profile')->name('view_profile');
        Route::view('/profile/edit', 	            'technician.edit_profile')->name('edit_profile');
        Route::view('/payments', 	                'technician.payments')->name('payments');
        Route::view('/messages', 	                'technician.messages')->name('messages');
    });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::view('/', 			                'admin.home')->name('home');
        Route::view('/requests', 	                'admin.requests.requests')->name('requests');
        Route::view('/requests/details/new', 	    'admin.requests.request_details')->name('request_details');
        Route::view('/requests/details/ongoing', 	'admin.requests.request_ongoing_details')->name('request_ongoing_details');
        Route::view('/requests/details/completed', 	'admin.requests.request_completed_details')->name('request_completed_details');
        Route::view('/requests/ongoing', 	        'admin.requests.requests_ongoing')->name('requests_ongoing');
        Route::view('/requests/completed', 	        'admin.requests.requests_completed')->name('requests_completed');
        Route::view('/requests/cancelled', 	        'admin.requests.requests_cancelled')->name('requests_cancelled');
        Route::view('/technicians', 	            'admin.technicians')->name('technicians');
        Route::view('/technicians/profile', 	    'admin.technicians_profile')->name('technicians_profile');
        Route::view('/profile', 	                'admin.view_profile')->name('view_profile');
        Route::view('/profile/edit', 	            'admin.edit_profile')->name('edit_profile');
        Route::view('/payments', 	                'admin.payments')->name('payments');
        Route::view('/messages', 	                'admin.messages')->name('messages');
        Route::view('/messages/sent', 	            'admin.messages_sent')->name('messages_sent');

        Route::view('/users/admin/add', 	        'admin.users.admin.add')->name('add_admin');
        Route::view('/users/admin/edit', 	        'admin.users.admin.edit')->name('edit_admin');
        Route::view('/users/admin/list', 	        'admin.users.admin.list')->name('list_admin');
        Route::view('/users/admin/summary', 	    'admin.users.admin.summary')->name('summary_admin');
        Route::view('/users/admin/activity-log', 	'admin.users.admin.activity_log')->name('activity_log_admin');

        Route::view('/users/cse/add', 	            'admin.users.cse.add')->name('add_cse');
        Route::view('/users/cse/edit', 	            'admin.users.cse.edit')->name('edit_cse');
        Route::view('/users/cse/list', 	            'admin.users.cse.list')->name('list_cse');
        Route::view('/users/cse/summary', 	        'admin.users.cse.summary')->name('summary_cse');
        Route::view('/users/cse/activity-log', 	    'admin.users.cse.activity_log')->name('activity_log_cse');

        Route::view('/users/client/list', 	            'admin.users.client.list')->name('list_client');
        Route::view('/users/client/summary', 	        'admin.users.client.summary')->name('summary_client');

        Route::view('/users/utilities/reset-password', 	'admin.utilities.reset_password')->name('utility_reset_password');
        
        Route::view('/users/technician/add', 	        'admin.users.technician.add')->name('add_technician');
        Route::view('/users/technician/edit', 	        'admin.users.technician.edit')->name('edit_technician');
        Route::view('/users/technician/list', 	        'admin.users.technician.list')->name('list_technician');
        Route::view('/users/technician/summary', 	    'admin.users.technician.summary')->name('summary_technician');
        Route::view('/users/technician/activity-log', 	'admin.users.technician.activity_log')->name('activity_log_technician');

        Route::view('/franchise/add', 	                'admin.franchise.add')->name('add_franchise');
        Route::view('/franchise/edit', 	                'admin.franchise.edit')->name('edit_franchise');
        Route::view('/franchise/list', 	                'admin.franchise.list')->name('list_franchise');

        Route::view('/tools-request', 	                'admin.tools.requests')->name('tools_request');
        Route::view('/tools-inventory', 	            'admin.tools.inventory')->name('tools_inventory');
        Route::view('/rfq', 	                        'admin.rfq')->name('rfq');
        Route::view('/services', 	                    'admin.services.services')->name('services');
        Route::view('/category/add', 	                'admin.services.add_category')->name('add_category');
        Route::view('/category/edit', 	                'admin.services.edit_category')->name('edit_category');
        Route::view('/category/list', 	                'admin.services.list_category')->name('list_category');

        Route::view('/payments/disbursed', 	            'admin.payments.disbursed')->name('disbursed_payments');
        Route::view('/payments/received', 	            'admin.payments.received')->name('received_payments');

    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
