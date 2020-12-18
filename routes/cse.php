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

Route::middleware(['cseRole'])->group(function() {
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
        Route::view('/location-request', 	        'cse.location_request')->name('cse.location_request');
    });
});