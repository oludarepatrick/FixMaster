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
Route::middleware(['technicianRole'])->group(function() {
    Route::prefix('technician')->group(function () {
        // Route::name('technician.')->group(function () {
            Route::view('/', 			                'technician.home')->name('technician.home');
            Route::view('/requests', 	                'technician.requests')->name('technician.requests');
            Route::view('/requests/details/', 	        'technician.request_details')->name('technician.request_details');
            Route::view('/profile', 	                'technician.view_profile')->name('technician.view_profile');
            Route::view('/profile/edit', 	            'technician.edit_profile')->name('technician.edit_profile');
            Route::view('/payments', 	                'technician.payments')->name('technician.payments');
            Route::view('/messages', 	                'technician.messages')->name('technician.messages');
            Route::view('/messages/sent', 	            'technician.messages_sent')->name('technician.messages_sent');
            Route::view('/location-request', 	        'technician.location_request')->name('technician.location_request');

            Route::get('/profile/view',                 [App\Http\Controllers\Technician\TechnicianProfileController::class, 'view_profile'])->name('technician.view_profile');
            Route::get('/profile/edit',                 [App\Http\Controllers\Technician\TechnicianProfileController::class, 'edit_profile'])->name('technician.edit_profile');
            Route::post('/profile/update',              [App\Http\Controllers\Technician\TechnicianProfileController::class, 'update_profile'])->name('technician.updateProfile');
            Route::post('/profile/updatePassword',      [App\Http\Controllers\Technician\TechnicianProfileController::class, 'updatePassword'])->name('technician.updatePassword');
            Route::post('/password/upadte',             [App\Http\Controllers\Technician\TechnicianProfileController::class, 'update_password'])->name('technician.update_password');
            Route::get('/view-profile',                 [App\Http\Controllers\Technician\TechnicianProfileController::class, 'view_profile' ])->name('technician.view_profile');



            Route::view('/payments', 	                'technician.payments')->name('technician.payments');
            Route::view('/messages', 	                'technician.messages')->name('technician.messages');
            Route::view('/messages/sent', 	            'technician.messages_sent')->name('technician.messages_sent');
            Route::view('/location-request', 	        'technician.location_request')->name('technician.location_request');

        // });
    });
});