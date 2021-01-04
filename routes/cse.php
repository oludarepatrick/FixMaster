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
        Route::get('/',                 [App\Http\Controllers\CSE\CSEProfileController::class, 'home'])->name('cse.home');
        // Route::view('/', 			                'cse.home')->name('cse.home');
        Route::view('/requests', 	                'cse.requests')->name('cse.requests');
        Route::view('/requests/details/new', 	    'cse.request_details')->name('cse.request_details');
        Route::view('/requests/details/ongoing', 	'cse.request_ongoing_details')->name('cse.request_ongoing_details');
        Route::view('/requests/details/completed', 	'cse.request_completed_details')->name('cse.request_completed_details');
        // Route::view('/requests/ongoing', 	        'cse.requests_ongoing')->name('cse.requests_ongoing');
        Route::view('/requests/completed', 	        'cse.requests_completed')->name('cse.requests_completed');
        Route::view('/requests/cancelled', 	        'cse.requests_cancelled')->name('cse.requests_cancelled');
        Route::view('/technicians', 	            'cse.technicians')->name('cse.technicians');
        Route::view('/technicians/profile', 	    'cse.technicians_profile')->name('cse.technicians_profile');
        // Route::view('/profile', 	                'cse.view_profile')->name('cse.view_profile');
  
        Route::get('/profile/view',                 [App\Http\Controllers\CSE\CSEProfileController::class, 'view_profile'])->name('cse.view_profile');
        Route::get('/profile/edit',                 [App\Http\Controllers\CSE\CSEProfileController::class, 'edit_profile'])->name('cse.edit_profile');
        Route::post('/profile/update',              [App\Http\Controllers\CSE\CSEProfileController::class, 'update_profile'])->name('cse.updateProfile');
        Route::post('/profile/updatePassword',      [App\Http\Controllers\CSE\CSEProfileController::class, 'updatePassword'])->name('cse.updatePassword');
        Route::post('/password/upadte',             [App\Http\Controllers\CSE\CSEProfileController::class, 'update_password'])->name('cse.update_password');
        Route::get('/view-profile',                 [App\Http\Controllers\CSE\CSEProfileController::class, 'view_profile' ])->name('cse.view_profile');
        // Route::view('/profile/edit', 	        'cse.edit_profile')->name('cse.edit_profile');

        Route::post('/add-message',                  [App\Http\Controllers\CSE\CSEMessageController::class, 'sendMessage' ])->name('add-message');
        Route::get('/getUserAssigned/{id}',         [App\Http\Controllers\CSE\CSEMessageController::class, 'getUserAssigned' ])->name('get-userAssigned');
        Route::post('save-message-data',             [App\Http\Controllers\CSE\CSEMessageController::class, 'saveMessageData' ])->name('cse.save-message-data');

        Route::view('/payments', 	                'cse.payments')->name('cse.payments');
        Route::view('/messages', 	                'cse.messages')->name('cse.messages');
        Route::view('/messages/sent', 	            'cse.messages_sent')->name('cse.messages_sent');
        Route::view('/location-request', 	        'cse.location_request')->name('cse.location_request');


        Route::get('/messages/inbox',                       [App\Http\Controllers\CSE\CSEMessageController::class, 'inbox'])->name('cse.inbox_messages');
        Route::get('/messages/inbox/details/{id}',          [App\Http\Controllers\CSE\CSEMessageController::class, 'inboxMessageDetails'])->name('cse.inbox_message_details');
        Route::get('/messages/outbox',                      [App\Http\Controllers\CSE\CSEMessageController::class, 'outbox'])->name('cse.outbox_messages');
        Route::get('/messages/outbox/details/{id}',         [App\Http\Controllers\CSE\CSEMessageController::class, 'outboxMessageDetails'])->name('cse.outbox_message_details');


        Route::get('/requests/ongoing',                     [App\Http\Controllers\CSE\CSERequestController::class, 'onGoing'])->name('cse.requests_ongoing');

    });
});