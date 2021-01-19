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

            Route::get('/requests',                       [App\Http\Controllers\Technician\TechnicianRequestController::class, 'requests'])->name('technician.requests');

            Route::get('/requests/details/{id}',          [App\Http\Controllers\Technician\TechnicianRequestController::class, 'requestDetails'])->name('technician.request_details');

            // Route::view('/requests', 	                'technician.requests')->name('technician.requests');
            // Route::view('/requests/details/', 	        'technician.request_details')->name('technician.request_details');
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
            Route::get('/view-profile',                 [App\Http\Controllers\Technician\TechnicianProfileController::class, 'view_profile' ])->name('technician.view_profile');

            Route::get('/payments',                           [App\Http\Controllers\Technician\TechnicianProfileController::class, 'payments' ])->name('technician.payments');
            // Route::view('/payments', 	                'technician.payments')->name('technician.payments');
            
            Route::view('/location-request', 	        'technician.location_request')->name('technician.location_request');

            Route::post('/add-message',                  [App\Http\Controllers\Technician\TechnicianMessageController::class, 'sendMessage' ])->name('add-message');
            Route::get('/getUserAssigned/{id}',          [App\Http\Controllers\Technician\TechnicianMessageController::class, 'getUserAssigned' ])->name('get-userAssigned');
            Route::post('save-message-data',             [App\Http\Controllers\Technician\TechnicianMessageController::class, 'saveMessageData' ])->name('technician.save-message-data');

            Route::get('/messages/inbox',                [App\Http\Controllers\Technician\TechnicianMessageController::class, 'inbox'])->name('inbox_messages');
            Route::get('/messages/inbox/details/{id}',   [App\Http\Controllers\Technician\TechnicianMessageController::class, 'inboxMessageDetails'])->name('inbox_message_details');
            Route::get('/messages/outbox',               [App\Http\Controllers\Technician\TechnicianMessageController::class, 'outbox'])->name('outbox_messages');
            Route::get('/messages/outbox/details/{id}',  [App\Http\Controllers\Technician\TechnicianMessageController::class, 'outboxMessageDetails'])->name('outbox_message_details');

            Route::get('/getUserAssigned/{id}',                   [App\Http\Controllers\Technician\TechnicianMessageController::class, 'getUserAssigned' ])->name('get-userAssigned');
            Route::post('save-message-data',                      [App\Http\Controllers\Technician\TechnicianMessageController::class, 'saveMessageData' ])->name('technician.save-message-data');

        // });
    });
});