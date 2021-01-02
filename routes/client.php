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

Route::middleware(['clientRole'])->group(function() {
    Route::prefix('client')->group(function () {
        Route::get('/',                                     [App\Http\Controllers\ClientDashboardController::class, 'index'])->name('client.home');
        Route::get('/settings',                                     [App\Http\Controllers\ClientDashboardController::class, 'settings'])->name('client.settings');
        Route::put('/settings/update-passsword',             [App\Http\Controllers\ClientDashboardController::class, 'updatePassword'])->name('client.update_profile_password');
        Route::put('/settings/update-profile',            [App\Http\Controllers\ClientDashboardController::class, 'updateProfile'])->name('client.update_profile');
        Route::put('/settings/update-avatar',            [App\Http\Controllers\ClientDashboardController::class, 'updateAvatar'])->name('client.update_profile_avatar');

        Route::get('/messages', 	            [App\Http\Controllers\ClientMessagingController::class, 'index'])->name('client.messages');
        Route::post('/messages',                  [App\Http\Controllers\ClientMessagingController::class, 'sendMessage'])->name('client.send_messages');
        Route::get('/messages/inbox/details/{id}',                       [App\Http\Controllers\ClientMessagingController::class, 'inboxMessageDetails'])->name('client.inbox_message_details');
        Route::get('/messages/outbox/details/{id}',                       [App\Http\Controllers\ClientMessagingController::class, 'outboxMessageDetails'])->name('client.outbox_message_details');

        Route::view('/service/custom', 	        'client.service_custom')->name('client.service_custom');
        Route::get('/services',                    [App\Http\Controllers\ClientDashboardController::class, 'services'])->name('client.services');
        Route::get('/services/quote/{url}',                                     [App\Http\Controllers\ClientDashboardController::class, 'serviceQuote'])->name('client.service_quote');
        Route::get('/services/details/{url}',                                     [App\Http\Controllers\ClientDashboardController::class, 'serviceDetails'])->name('client.services_details');
        Route::post('/services/search',              [App\Http\Controllers\ClientDashboardController::class, 'searchCategories'])->name('client.services_search');
        Route::post('/services/quote/store',                                     [App\Http\Controllers\ClientRequestController::class, 'store'])->name('client.book_services');
        

        Route::get('/requests',                    [App\Http\Controllers\ClientRequestController::class, 'index'])->name('client.requests');
        Route::get('/requests/details/{ref}',                    [App\Http\Controllers\ClientRequestController::class, 'requestDetails'])->name('client.request_details');
        Route::get('/requests/edit/{id}',            [App\Http\Controllers\ClientRequestController::class, 'edit'])->name('client.edit_request');
        Route::put('/requests/update/{id}',            [App\Http\Controllers\ClientRequestController::class, 'update'])->name('client.update_request');

        Route::get('/requests/completed/{id}',      [App\Http\Controllers\ClientRequestController::class, 'markRequestAsCompleted'])->name('client.mark_request_as_completed');

        Route::post('/requests/cancel/{id}',      [App\Http\Controllers\ClientRequestController::class, 'cancelRequest'])->name('client.cancel_request');

        Route::view('/requests/invoice', 	    'client.request_invoice')->name('client.request_invoice');

        
        Route::view('/payments', 	            'client.payments')->name('client.payments');
        Route::view('/wallet', 	                'client.wallet')->name('client.wallet');
        Route::view('/technician', 	            'client.technician_profile')->name('client.technician_profile');

    });
});