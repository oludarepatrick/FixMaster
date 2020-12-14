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

//Clear configurations:
Route::get('/config-clear', function() {
    $status = Artisan::call('config:clear');
    return '<h1 style="color: #4CAF50">Configurations cleared</h1>';
});

//Clear cache:
Route::get('/cache-clear', function() {
    $status = Artisan::call('cache:clear');
    return '<h1 style="color: #4CAF50">Cache cleared</h1>';
});

//Clear view:
Route::get('/view-clear', function() {
    $status = Artisan::call('view:clear');
    return '<h1 style="color: #4CAF50">Views cleared</h1>';
});

//Clear route:
Route::get('/route-clear', function() {
    $status = Artisan::call('route:clear');
    return '<h1 style="color: #4CAF50">Routes cleared</h1>';
});

Route::get('details', function () {

	$ip = '50.90.0.1';
    // $ip = $_SERVER['REMOTE_ADDR'];
    // return $ip;
    $data = \Location::get($ip);
    dd($data);
   
});

Route::get('/email', function () {
    return new ClientRegistrationEmail();
});

//Client registraion routes
Route::get('/register',                    [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register',                   [App\Http\Controllers\Auth\RegisterController::class, 'registerClient'])->name('client.register');
Route::get('/client-email-verify',         [App\Http\Controllers\Auth\RegisterController::class, 'verifyClientEmail'])->name('client.verify_email');

//Users login, verification, logout and dashboard routes
Route::get('/home',                         [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login',                        [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/verify-credentials',          [App\Http\Controllers\Auth\LoginController::class, 'verifyCredentials'])->name('verify_credentials');
Route::get('/logout',                       [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Static Frontend pages routes
Route::view('/',           			        'page.homepage')->name('page.home');
Route::view('/about', 				        'page.about')->name('page.about');
Route::view('/how-it-works', 		        'page.how_it_works')->name('page.how_it_works');
Route::view('/why-home-fix', 		        'page.why_home_fix')->name('page.why_home_fix');
Route::view('/join-us', 			        'page.careers')->name('page.careers');
Route::view('/faq', 			            'page.faq')->name('page.faq');
Route::view('/contact-us', 			        'page.contact')->name('page.contact');
// Route::view('/services', 			        'page.services')->name('page.services');
Route::view('/service-details', 			'page.service_details')->name('page.services_details');
Route::get('/services',                    [App\Http\Controllers\PageController::class, 'services'])->name('page.services');

//Essential Routes
Route::post('/lga-list',                    [App\Http\Controllers\EssentialsController::class, 'lgasList'])->name('lga_list');

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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::middleware(['adminRole', 'superAdminRole'])->group(function() {
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


                Route::view('/users/cse/add', 	                    'admin.users.cse.add')->name('add_cse');
                Route::view('/users/cse/edit', 	                    'admin.users.cse.edit')->name('edit_cse');
                Route::view('/users/cse/list', 	                    'admin.users.cse.list')->name('list_cse');
                Route::view('/users/cse/summary', 	                'admin.users.cse.summary')->name('summary_cse');
                Route::view('/users/cse/activity-log', 	            'admin.users.cse.activity_log')->name('activity_log_cse');

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
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
