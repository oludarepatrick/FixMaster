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

Route::prefix('technician')->group(function () {
    Route::name('technician.')->group(function () {
        Route::view('/', 			                'technician.home')->name('home');
        Route::view('/requests', 	                'technician.requests')->name('requests');
        Route::view('/requests/details/', 	        'technician.request_details')->name('request_details');
        Route::view('/profile', 	                'technician.view_profile')->name('view_profile');
        Route::view('/profile/edit', 	            'technician.edit_profile')->name('edit_profile');
        Route::view('/payments', 	                'technician.payments')->name('payments');
        Route::view('/messages', 	                'technician.messages')->name('messages');
        Route::view('/messages/sent', 	            'technician.messages_sent')->name('messages_sent');
        Route::view('/location-request', 	        'technician.location_request')->name('location_request');

    });
});