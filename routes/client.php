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
        Route::view('/messages', 	            'client.messages')->name('client.messages');
        // Route::view('/services', 	            'client.services')->name('client.services');
        Route::view('/service/custom', 	        'client.service_custom')->name('client.service_custom');
        // Route::view('/services/quote', 	        'client.service_quote')->name('client.service_quote');
        Route::get('/services',                    [App\Http\Controllers\ClientDashboardController::class, 'services'])->name('client.services');
        Route::get('/services/quote/{url}',                                     [App\Http\Controllers\ClientDashboardController::class, 'serviceQuote'])->name('client.service_quote');
        Route::get('/services/details/{url}',                                     [App\Http\Controllers\ClientDashboardController::class, 'serviceDetails'])->name('client.services_details');
        Route::post('/services/quote/store',                                     [App\Http\Controllers\ServiceRequestController::class, 'store'])->name('client.book_services');
        Route::get('/requests',                    [App\Http\Controllers\ClientRequestController::class, 'index'])->name('client.requests');
        Route::get('/requests/details/{ref}',                    [App\Http\Controllers\ClientRequestController::class, 'requestDetails'])->name('client.request_details');

        // Route::view('/requests', 	            'client.requests')->name('client.requests');
        // Route::view('/requests/details', 	    'client.request_details')->name('client.request_details');
        Route::view('/requests/invoice', 	    'client.request_invoice')->name('client.request_invoice');
        Route::view('/payments', 	            'client.payments')->name('client.payments');
        Route::view('/wallet', 	                'client.wallet')->name('client.wallet');
        Route::view('/technician', 	            'client.technician_profile')->name('client.technician_profile');

    });
});