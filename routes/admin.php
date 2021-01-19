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

                Route::get('/requests',                             [App\Http\Controllers\AdminRequestController::class, 'index'])->name('requests');
                Route::get('/requests/details/{ref}',               [App\Http\Controllers\AdminRequestController::class, 'requestDetails'])->name('request_details');
                Route::post('/requests/assign-cse-technician/{id}', [App\Http\Controllers\AdminRequestController::class, 'assignCSETechnician'])->name('assign_cse_technician');
                Route::get('/requests/ongoing',                     [App\Http\Controllers\AdminRequestController::class, 'ongoingRequests'])->name('requests_ongoing');
                Route::get('/requests/ongoing/details/{id}',        [App\Http\Controllers\AdminRequestController::class, 'ongoingRequestDetails'])->name('request_ongoing_details');
                Route::post('/requests/ongoing/update',             [App\Http\Controllers\AdminRequestController::class, 'updateOngoingProgress'])->name('request_ongoing_update');
                Route::get('/requests/ongoing/completed/{id}',      [App\Http\Controllers\AdminRequestController::class, 'markRequestAsCompleted'])->name('mark_request_as_completed');
                Route::get('/requests/completed/details/{id}',      [App\Http\Controllers\AdminRequestController::class, 'completedRequestDetails'])->name('request_completed_details');
                Route::get('/requests/completed', 	                [App\Http\Controllers\AdminRequestController::class, 'completedRequests'])->name('requests_completed');
                Route::get('/requests/cancelled', 	                [App\Http\Controllers\AdminRequestController::class, 'cancelledRequests'])->name('requests_cancelled');
                Route::get('/requests/cancelled/details/{id}',      [App\Http\Controllers\AdminRequestController::class, 'cancelledRequestDetails'])->name('request_cancelled_details');

                Route::view('/technicians', 	                    'admin.technicians')->name('technicians');
                Route::view('/technicians/profile', 	            'admin.technicians_profile')->name('technicians_profile');
                Route::view('/profile', 	                        'admin.view_profile')->name('view_profile');

                Route::get('/profile/edit',                         [App\Http\Controllers\AdminProfileController::class, 'showProfile'])->name('edit_profile');
                Route::get('/profile/update',                       [App\Http\Controllers\AdminProfileController::class, 'updateProfile'])->name('update_profile');
                Route::put('/profile/update-passsword',             [App\Http\Controllers\AdminProfileController::class, 'updatePassword'])->name('update_profile_password');
                
                Route::view('/payments', 	                        'admin.payments')->name('payments');

                Route::get('/messages/inbox',                       [App\Http\Controllers\AdminMessagingController::class, 'inbox'])->name('inbox_messages');
                Route::get('/messages/inbox/details/{id}',                       [App\Http\Controllers\AdminMessagingController::class, 'inboxMessageDetails'])->name('inbox_message_details');
                Route::get('/messages/outbox',                       [App\Http\Controllers\AdminMessagingController::class, 'outbox'])->name('outbox_messages');
                Route::get('/messages/outbox/details/{id}',                       [App\Http\Controllers\AdminMessagingController::class, 'outboxMessageDetails'])->name('outbox_message_details');
                Route::post('/messages',                  [App\Http\Controllers\AdminMessagingController::class, 'sendMessage'])->name('send_messages');


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

                Route::get('/users/cse',                            [App\Http\Controllers\AdminCSEController::class, 'index'])->name('list_cse');
                Route::get('/users/cse/add',                        [App\Http\Controllers\AdminCSEController::class, 'create'])->name('add_cse');
                Route::post('/users/cse/store',                     [App\Http\Controllers\AdminCSEController::class, 'store'])->name('store_cse');
                Route::get('/users/cse/edit/{user}',                [App\Http\Controllers\AdminCSEController::class, 'edit'])->name('edit_cse');
                Route::get('/users/cse/summary/{user}',             [App\Http\Controllers\AdminCSEController::class, 'show'])->name('summary_cse');
                Route::put('/users/cse/update/{user}',              [App\Http\Controllers\AdminCSEController::class, 'update'])->name('update_cse');
                Route::get('/users/cse/delete/{user}',              [App\Http\Controllers\AdminCSEController::class, 'delete'])->name('delete_cse');
                Route::get('/users/cse/deactivate/{user}',          [App\Http\Controllers\AdminCSEController::class, 'deactivate'])->name('deactivate_cse');
                Route::get('/users/cse/reinstate/{user}',           [App\Http\Controllers\AdminCSEController::class, 'reinstate'])->name('reinstate_cse');
                Route::post('/users/cse/activity-log/sorting',      [App\Http\Controllers\AdminCSEController::class, 'sortActivityLog'])->name('activity_log_sorting_cse');

                Route::get('/users/client/list', 	                 [App\Http\Controllers\AdminClientController::class, 'index'])->name('list_client');
                Route::put('/users/client/update/{user}',            [App\Http\Controllers\AdminClientController::class, 'update'])->name('update_client');
                Route::get('/users/client/delete/{user}',            [App\Http\Controllers\AdminClientController::class, 'delete'])->name('delete_client');
                Route::get('/users/client/deactivate/{user}',        [App\Http\Controllers\AdminClientController::class, 'deactivate'])->name('deactivate_client');
                Route::get('/users/client/reinstate/{user}',         [App\Http\Controllers\AdminClientController::class, 'reinstate'])->name('reinstate_client');
                Route::get('/users/client/summary/{user}',           [App\Http\Controllers\AdminClientController::class, 'summary'])->name('summary_client');
                Route::post('/users/client/activity-log/sorting',    [App\Http\Controllers\AdminClientController::class, 'sortActivityLog'])->name('activity_log_sorting_client');

                Route::get('/utilities/service-request-status',                     [App\Http\Controllers\ServiceRequestStatusController::class, 'index'])->name('utility_service_request_status');
                Route::post('/utilities/service-request-status/store',              [App\Http\Controllers\ServiceRequestStatusController::class, 'store'])->name('store_service_request_status');
                Route::get('/utilities/service-request-status/edit/{id}',           [App\Http\Controllers\ServiceRequestStatusController::class, 'edit'])->name('edit_service_request_status');
                Route::put('/utilities/service-request-status/update/{id}',         [App\Http\Controllers\ServiceRequestStatusController::class, 'update'])->name('update_service_request_status');
                Route::get('/utilities/service-request-status/delete/{id}',         [App\Http\Controllers\ServiceRequestStatusController::class, 'delete'])->name('delete_service_request_status');

                Route::get('/users/utilities/reset-password',                     [App\Http\Controllers\UtilityController::class, 'index'])->name('utility_reset_password');
                Route::post('/users/utilities/reset-password',                     [App\Http\Controllers\UtilityController::class, 'resetPassword'])->name('utility_save_password');

                Route::view('/users/utilities/verify-payment', 	    'admin.utilities.verify_payment')->name('utility_verify_payment');
                
                Route::get('/users/technician',                          [App\Http\Controllers\AdminTechnicianController::class, 'index'])->name('list_technician');
                Route::get('/users/technician/add',                      [App\Http\Controllers\AdminTechnicianController::class, 'create'])->name('add_technician');
                Route::post('/users/technician/store',                   [App\Http\Controllers\AdminTechnicianController::class, 'store'])->name('store_technician');
                Route::get('/users/technician/edit/{user}',              [App\Http\Controllers\AdminTechnicianController::class, 'edit'])->name('edit_technician');
                Route::put('/users/technician/update/{user}',            [App\Http\Controllers\AdminTechnicianController::class, 'update'])->name('update_technician');
                Route::get('/users/technician/summary/{user}',           [App\Http\Controllers\AdminTechnicianController::class, 'show'])->name('summary_technician');
                Route::get('/users/technician/delete/{user}',            [App\Http\Controllers\AdminTechnicianController::class, 'delete'])->name('delete_technician');
                Route::get('/users/technician/deactivate/{user}',        [App\Http\Controllers\AdminTechnicianController::class, 'deactivate'])->name('deactivate_technician');
                Route::get('/users/technician/reinstate/{user}',         [App\Http\Controllers\AdminTechnicianController::class, 'reinstate'])->name('reinstate_technician');
                Route::post('/users/technician/activity-log/sorting',    [App\Http\Controllers\AdminTechnicianController::class, 'sortActivityLog'])->name('activity_log_sorting_technician');

                Route::view('/franchise/add', 	                    'admin.franchise.add')->name('add_franchise');
                Route::view('/franchise/edit', 	                    'admin.franchise.edit')->name('edit_franchise');
                Route::view('/franchise/list', 	                    'admin.franchise.list')->name('list_franchise');

                Route::get('/tools-inventory',                      [App\Http\Controllers\ToolsInventoryController::class, 'index'])->name('tools_inventory');
                Route::post('/tools-inventory/store',               [App\Http\Controllers\ToolsInventoryController::class, 'store'])->name('store_tools_inventory');
                Route::get('/tools-inventory/edit/{id}',            [App\Http\Controllers\ToolsInventoryController::class, 'edit'])->name('edit_tools_inventory');
                Route::put('/tools-inventory/update/{id}',          [App\Http\Controllers\ToolsInventoryController::class, 'update'])->name('update_tools_inventory');
                Route::get('/tools-inventory/delete/{id}',          [App\Http\Controllers\ToolsInventoryController::class, 'delete'])->name('delete_tools_inventory');

                Route::get('/tools-request',                        [App\Http\Controllers\ToolsRequestController::class, 'index'])->name('tools_request');
                Route::get('/tools-request/details/{id}',           [App\Http\Controllers\ToolsRequestController::class, 'toolRequestDetails'])->name('tool_request_details');
                Route::get('/tools-request/approve/{id}',           [App\Http\Controllers\ToolsRequestController::class, 'approveRequest'])->name('approve_tool_request');
                Route::get('/tools-request/decline/{id}',           [App\Http\Controllers\ToolsRequestController::class, 'declineRequest'])->name('decline_tool_request');
                Route::get('/tools-request/return/{id}',            [App\Http\Controllers\ToolsRequestController::class, 'returnToolsRequested'])->name('return_tools_requested');
                
                
                Route::get('/rfq',                                  [App\Http\Controllers\RFQController::class, 'index'])->name('rfq');
                Route::get('/rfq/details/{id}',                     [App\Http\Controllers\RFQController::class, 'rfqDetails'])->name('rfq_details');
                
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

                //Admin payment Routes
                Route::get('/payment-gateway/list',                 [App\Http\Controllers\GatewayController::class, 'index'])->name('list_payment_gateway');
                
                Route::post('/paystack/update',                     [App\Http\Controllers\GatewayController::class, 'paystackUpdate'])->name('paystack_update');

                Route::post('/flutter/update',                      [App\Http\Controllers\GatewayController::class, 'flutterUpdate'])->name('flutter_update');

                Route::view('/category/review', 	                'admin.services.review_category')->name('review_category');

                Route::get('/payments/received', 
                [App\Http\Controllers\PaymentsController::class, 'receivedPayments'])->name('received_payments');
                Route::get('/payments/disbursed', 
                [App\Http\Controllers\PaymentsController::class, 'disbursedPayments'])->name('disbursed_payments');

                Route::post('/payments/disbursed/sorting',                [App\Http\Controllers\PaymentsController::class, 'sortDisbursedPayments'])->name('disbursed_payments_sorting');

                Route::post('/payments/recieved/sorting',                [App\Http\Controllers\PaymentsController::class, 'sortReceivedPayments'])->name('recieved_payments_sorting');

                Route::post('/payments/record-payment', 
                [App\Http\Controllers\PaymentsController::class, 'recordPayment'])->name('record_payments');
                Route::get('/payments/ongoing-service-request/{id}', [App\Http\Controllers\PaymentsController::class, 'getOngoingServiceRequestDetail'])->name('ongoing_service_request_detail');

                Route::view('/ratings/category', 	                'admin.ratings.category')->name('category_ratings');
                Route::view('/ratings/job', 	                    'admin.ratings.job')->name('job_ratings');
               
                //  location request
                Route::get('/location-request',                     [App\Http\Controllers\AdminLocationRequestController::class, 'index'])->name('location_request'); 
                Route::post('/get-names',                           [App\Http\Controllers\AdminLocationRequestController::class, 'getNames'])->name('get_names');
                Route::post('/request-location',                    [App\Http\Controllers\AdminLocationRequestController::class, 'requestLocation'])->name('request_location');

               
            });
        });
    // });
});

