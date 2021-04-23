<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CustomerViewingProviderController;



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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('about', function() {
    return view('about');
})->name('about');

Route::get('faq', function(){
    return view('faq');
})->name('faq');
Route::get('faq', function(){
    return view('faq');
})->name('faq');







Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/review', [ReviewController::class, 'index'])->name('review');
Route::get('/customerviewingproviderpage', [CustomerViewingProviderController::class, 'index'])->name('customerviewingproviderpage');



Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();
    Route::prefix('/customer')->name('customer.')->namespace('customer')->group(function() {

     Route::get('/dashboard',[App\Http\Controllers\Customer\DashboardController::class,'index'])->name('dashboard')->middleware('customer');



    //Login Register Routes
    Route::get('/register', [App\Http\Controllers\Customer\Auth\RegisterController::class, 'CustomerRegisterForm'])->name('showregister');
    Route::post('/register', [App\Http\Controllers\Customer\Auth\RegisterController::class, 'RegisterCustomer'])->name('register');
    Route::get('/login', [App\Http\Controllers\Customer\Auth\LoginController::class, 'showLoginForm'])->name('showlogin');
    Route::post('/login', [App\Http\Controllers\Customer\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/logout', [App\Http\Controllers\Customer\Auth\LoginController::class, 'logout'])->name('logout');



});

    //Admin Routes
    Route::prefix('/admin')->name('admin.')->namespace('admin')->group(function() {

        Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard')->middleware('admin');



        //Login Register Routes

        Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('showlogin');
        Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
        Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
//Add Customer
        Route::get('/customer/add', [App\Http\Controllers\Admin\Customer\AddCustomerController::class, 'CustomerRegisterForm'])->name('addcustomerpage')->middleware('admin');
        Route::post('/customer/add', [App\Http\Controllers\Admin\Customer\AddCustomerController::class, 'AddCustomer'])->name('customer.add')->middleware('admin');
//Add Provider
        Route::get('/provider/add', [App\Http\Controllers\Admin\Provider\AddProviderController::class, 'ProviderRegisterForm'])->name('addproviderpage')->middleware('admin');
        Route::post('/provider/add', [App\Http\Controllers\Admin\Provider\AddProviderController::class, 'AddProvider'])->name('provider.add')->middleware('admin');




    });
    Route::prefix('/provider')->name('provider.')->namespace('provider')->group(function() {

        Route::get('/dashboard',[App\Http\Controllers\Provider\DashboardController::class,'index'])->name('dashboard')->middleware('provider');



        //Login Register Routes

        Route::get('/login', [App\Http\Controllers\Provider\Auth\LoginController::class, 'showLoginForm'])->name('showlogin');
        Route::post('/login', [App\Http\Controllers\Provider\Auth\LoginController::class, 'login'])->name('login');
        Route::post('/logout', [App\Http\Controllers\Provider\Auth\LoginController::class, 'logout'])->name('logout');





    });


});

