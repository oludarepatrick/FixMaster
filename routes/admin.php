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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['adminRole'])->group(function() {
    // Route::group(['middleware' => 'superAdminRole'], function () {
    // Route::group(['middleware' => 'adminRole'], function () {
        Route::prefix('admin')->group(function () {
            Route::name('admin.')->group(function () {
                Route::get('/',                                     [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('home');
                Route::get('/activity-log',                         [App\Http\Controllers\ActivityLogController::class, 'index'])->middleware(['superAdminRole'])->name('activity_log');
                Route::post('/activity-log/sorting',                [App\Http\Controllers\ActivityLogController::class, 'sortActivityLog'])->name('activity_log_sorting_users');
                Route::get('/activity-log/details/{id}',            [App\Http\Controllers\ActivityLogController::class, 'activityLogDetails'])->name('activity_log_details');

                Route::get('/requests',                    [App\Http\Controllers\AdminRequestController::class, 'index'])->name('requests');
                Route::get('/requests/details/new/{ref}',                    [App\Http\Controllers\AdminRequestController::class, 'requestDetails'])->name('request_details');
                // Route::view('/requests', 	                        'admin.requests.requests')->name('requests');
                // Route::view('/requests/details/new', 	            'admin.requests.request_details')->name('request_details');
                Route::view('/requests/details/ongoing', 	        'admin.requests.request_ongoing_details')->name('request_ongoing_details');
                Route::view('/requests/details/completed', 	        'admin.requests.request_completed_details')->name('request_completed_details');
                Route::view('/requests/ongoing', 	                'admin.requests.requests_ongoing')->name('requests_ongoing');
                Route::view('/requests/completed', 	                'admin.requests.requests_completed')->name('requests_completed');
                Route::view('/requests/cancelled', 	                'admin.requests.requests_cancelled')->name('requests_cancelled');
                Route::view('/technicians', 	                    'admin.technicians')->name('technicians');
                Route::view('/technicians/profile', 	            'admin.technicians_profile')->name('technicians_profile');
                Route::view('/profile', 	                        'admin.view_profile')->name('view_profile');

                Route::get('/profile/edit',                         [App\Http\Controllers\AdminProfileController::class, 'showProfile'])->name('edit_profile');
                Route::get('/profile/update',                       [App\Http\Controllers\AdminProfileController::class, 'updateProfile'])->name('update_profile');
                Route::put('/profile/update-passsword',             [App\Http\Controllers\AdminProfileController::class, 'updatePassword'])->name('update_profile_password');
                
                Route::view('/payments', 	                        'admin.payments')->name('payments');
                Route::view('/messages', 	                        'admin.messages')->name('messages');
                Route::view('/messages/sent', 	                    'admin.messages_sent')->name('messages_sent');

                Route::get('/users/admin',                          [App\Http\Controllers\AdminUserController::class, 'index'])->name('list_admin');
                Route::get('/users/admin/add',                      [App\Http\Controllers\AdminUserController::class, 'create'])->name('add_admin');
                Route::post('/users/admin/store',                   [App\Http\Controllers\AdminUserController::class, 'store'])->name('store_admin');
                Route::get('/users/admin/summary/{user}',           [App\Http\Controllers\AdminUserController::class, 'show'])->name('summary_admin');
                Route::get('/users/admin/edit/{user}',              [App\Http\Controllers\AdminUserController::class, 'edit'])->name('edit_admin');
                Route::get('/users/admin/activity-log/{user}', 	    [App\Http\Controllers\AdminUserController::class, 'activityLog'])->name('activity_log_admin');
                Route::put('/users/admin/update/{user}',            [App\Http\Controllers\AdminUserController::class, 'update'])->name('update_admin');
                Route::get('/users/admin/delete/{user}',            [App\Http\Controllers\AdminUserController::class, 'delete'])->name('delete_admin');
                Route::get('/users/admin/deactivate/{user}',        [App\Http\Controllers\AdminUserController::class, 'deactivate'])->name('deactivate_admin');
                Route::get('/users/admin/reinstate/{user}',         [App\Http\Controllers\AdminUserController::class, 'reinstate'])->name('reinstate_admin');
                Route::post('/users/admin/activity-log/sorting',    [App\Http\Controllers\AdminUserController::class, 'sortActivityLog'])->name('activity_log_sorting_admin');

                Route::get('/users/cse',                          [App\Http\Controllers\AdminCSEController::class, 'index'])->name('list_cse');
                Route::get('/users/cse/add',                      [App\Http\Controllers\AdminCSEController::class, 'create'])->name('add_cse');
                Route::post('/users/cse/store',                   [App\Http\Controllers\AdminCSEController::class, 'store'])->name('store_cse');
                Route::get('/users/cse/edit/{user}',              [App\Http\Controllers\AdminCSEController::class, 'edit'])->name('edit_cse');
                // Route::view('/users/cse/summary', 	                'admin.users.cse.summary')->name('summary_cse');
                // Route::view('/users/cse/activity-log', 	            'admin.users.cse.activity_log')->name('activity_log_cse');
                Route::get('/users/cse/summary/{user}',           [App\Http\Controllers\AdminCSEController::class, 'show'])->name('summary_cse');
                Route::put('/users/cse/update/{user}',            [App\Http\Controllers\AdminCSEController::class, 'update'])->name('update_cse');
                Route::get('/users/cse/delete/{user}',            [App\Http\Controllers\AdminCSEController::class, 'delete'])->name('delete_cse');
                Route::get('/users/cse/deactivate/{user}',        [App\Http\Controllers\AdminCSEController::class, 'deactivate'])->name('deactivate_cse');
                Route::get('/users/cse/reinstate/{user}',         [App\Http\Controllers\AdminCSEController::class, 'reinstate'])->name('reinstate_cse');
                Route::post('/users/cse/activity-log/sorting',    [App\Http\Controllers\AdminCSEController::class, 'sortActivityLog'])->name('activity_log_sorting_cse');

                Route::get('/users/client/list', 	                [App\Http\Controllers\AdminClientController::class, 'index'])->name('list_client');
                Route::put('/users/client/update/{user}',            [App\Http\Controllers\AdminClientController::class, 'update'])->name('update_client');
                Route::get('/users/client/delete/{user}',            [App\Http\Controllers\AdminClientController::class, 'delete'])->name('delete_client');
                Route::get('/users/client/deactivate/{user}',        [App\Http\Controllers\AdminClientController::class, 'deactivate'])->name('deactivate_client');
                Route::get('/users/client/reinstate/{user}',         [App\Http\Controllers\AdminClientController::class, 'reinstate'])->name('reinstate_client');
                Route::get('/users/client/summary/{user}',         [App\Http\Controllers\AdminClientController::class, 'summary'])->name('summary_client');
                // Route::view('/users/client/summary', 	            'admin.users.client.summary')->name('summary_client');

                Route::view('/users/utilities/reset-password', 	    'admin.utilities.reset_password')->name('utility_reset_password');
                Route::view('/users/utilities/project-status', 	    'admin.utilities.project_status')->name('utility_project_status');
                Route::view('/users/utilities/verify-payment', 	    'admin.utilities.verify_payment')->name('utility_verify_payment');
                
                
                Route::view('/users/technician/add', 	            'admin.users.technician.add')->name('add_technician');
                Route::view('/users/technician/edit', 	            'admin.users.technician.edit')->name('edit_technician');
                Route::view('/users/technician/list', 	            'admin.users.technician.list')->name('list_technician');
                Route::view('/users/technician/summary', 	        'admin.users.technician.summary')->name('summary_technician');
                Route::view('/users/technician/activity-log', 	    'admin.users.technician.activity_log')->name('activity_log_technician');

                Route::view('/franchise/add', 	                    'admin.franchise.add')->name('add_franchise');
                Route::view('/franchise/edit', 	                    'admin.franchise.edit')->name('edit_franchise');
                Route::view('/franchise/list', 	                    'admin.franchise.list')->name('list_franchise');

                Route::view('/tools-request', 	                    'admin.tools.requests')->name('tools_request');
                Route::view('/tools-inventory', 	                'admin.tools.inventory')->name('tools_inventory');
                Route::view('/rfq', 	                            'admin.rfq')->name('rfq');
                Route::get('/services',                             [App\Http\Controllers\ServicesController::class, 'index'])->name('services');
                Route::post('/services/store',                      [App\Http\Controllers\ServicesController::class, 'store'])->name('store_services');
                Route::get('/services/delete/{id}',                 [App\Http\Controllers\ServicesController::class, 'delete'])->name('delete_service');
                Route::get('/services/deactivate/{id}',             [App\Http\Controllers\ServicesController::class, 'deactivate'])->name('deactivate_service');
                Route::get('/services/reinstate/{id}',              [App\Http\Controllers\ServicesController::class, 'reinstate'])->name('reinstate_service');
                Route::get('/services/details/{id}',                [App\Http\Controllers\ServicesController::class, 'serviceDetails'])->name('service_details');
                Route::get('/services/reassign/{id}',               [App\Http\Controllers\ServicesController::class, 'serviceReassign'])->name('reassign_service');
                Route::post('/services/reassign/category',          [App\Http\Controllers\ServicesController::class, 'serviceCategoryReassign'])->name('reassign_service_category');
                Route::get('/services/edit/{id}',                   [App\Http\Controllers\ServicesController::class, 'edit'])->name('edit_service');
                Route::post('/services/update/',                    [App\Http\Controllers\ServicesController::class, 'update'])->name('update_service');

                Route::get('/category/add',                         [App\Http\Controllers\CategoryController::class, 'create'])->name('add_category');
                Route::post('/category/store',                      [App\Http\Controllers\CategoryController::class, 'store'])->name('store_category');
                Route::get('/category/list',                        [App\Http\Controllers\CategoryController::class, 'index'])->name('list_category');
                Route::get('/category/delete/{id}',                 [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete_category');
                Route::get('/category/deactivate/{id}',             [App\Http\Controllers\CategoryController::class, 'deactivate'])->name('deactivate_category');
                Route::get('/category/reinstate/{id}',              [App\Http\Controllers\CategoryController::class, 'reinstate'])->name('reinstate_category');
                Route::get('/category/details/{id}',                [App\Http\Controllers\CategoryController::class, 'categoryDetails'])->name('category_details');
                Route::get('/category/edit/{id}',                   [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit_category');
                Route::put('/category/update/{id}',                 [App\Http\Controllers\CategoryController::class, 'update'])->name('update_category');

                Route::view('/category/review', 	                'admin.services.review_category')->name('review_category');

                Route::view('/payments/disbursed', 	                'admin.payments.disbursed')->name('disbursed_payments');
                Route::view('/payments/received', 	                'admin.payments.received')->name('received_payments');

                Route::view('/ratings/category', 	                'admin.ratings.category')->name('category_ratings');
                Route::view('/ratings/job', 	                    'admin.ratings.job')->name('job_ratings');
                Route::view('/location-request', 	                'admin.location_request')->name('location_request');
                Route::view('/payment-gateway/add', 	            'admin.payment_gateways.add')->name('add_payment_gateway');
                Route::view('/payment-gateway/edit', 	            'admin.payment_gateways.edit')->name('edit_payment_gateway');
                Route::view('/payment-gateway/list', 	            'admin.payment_gateways.list')->name('list_payment_gateway');
                
            });
        });
    // });
});

