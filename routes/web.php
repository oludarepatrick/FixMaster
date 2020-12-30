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
Route::get('/services',                     [App\Http\Controllers\PageController::class, 'services'])->name('page.services');

//Essential Routes
Route::post('/lga-list',                    [App\Http\Controllers\EssentialsController::class, 'lgasList'])->name('lga_list');
Route::post('/avalaible-tool-quantity',     [App\Http\Controllers\EssentialsController::class, 'getAvailableToolQuantity'])->name('available_quantity');
Route::get('/administrators-list',          [App\Http\Controllers\EssentialsController::class, 'getAdministratorsList'])->name('administrators_list');
Route::get('/clients-list',                 [App\Http\Controllers\EssentialsController::class, 'getClientsList'])->name('clients_list');
Route::get('/technicians-list',             [App\Http\Controllers\EssentialsController::class, 'getTechniciansList'])->name('technicians_list');
Route::get('/cses-list',                    [App\Http\Controllers\EssentialsController::class, 'getCsesList'])->name('cses_list');
Route::get('/ongoing-service-requests',     [App\Http\Controllers\EssentialsController::class, 'getOngoingServiceRequests'])->name('ongoing_service_request_list');
Route::get('/services/details/{id}',        [App\Http\Controllers\ServicesController::class, 'serviceDetails'])->name('service_details');



// Auth::routes();

