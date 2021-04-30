<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;


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



Route::get('/home', [HomeController::class, 'index'])->name('home');


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


        Route::get('/service/all', [App\Http\Controllers\Customer\ServiceController::class,'allservice'])->name('allservice')->middleware('customer');
        Route::get('/service/booked', [App\Http\Controllers\Customer\ServiceController::class,'showservice'])->name('showservice')->middleware('customer');
        Route::get('/service/all/{id}', [App\Http\Controllers\Customer\ServiceController::class,'addservice'])->name('addservice')->middleware('customer');
        Route::get('/service/booked/{id}', [App\Http\Controllers\Customer\ServiceController::class,'deleteservice'])->name('deleteservice')->middleware('customer');


        Route::get('/provider', [App\Http\Controllers\Customer\MeetingController::class,'showprovider'])->name('showprovider')->middleware('customer');
        Route::get('/provider/{id}', [App\Http\Controllers\Customer\MeetingController::class,'showmeeting'])->name('showmeeting')->middleware('customer');
        Route::post('/provider/{id}', [App\Http\Controllers\Customer\MeetingController::class,'schedulemeeting'])->name('addmeeting')->middleware('customer');

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


        Route::get('/service/add', [App\Http\Controllers\Provider\ServiceController::class,'addservicepage'])->name('addservicepage')->middleware('provider');
        Route::post('/service/add', [App\Http\Controllers\Provider\ServiceController::class,'addservice'])->name('addservice')->middleware('provider');
        Route::get('/service/all', [App\Http\Controllers\Provider\ServiceController::class,'allservice'])->name('allservice')->middleware('provider');


        Route::get('/meeting', [App\Http\Controllers\Provider\MeetingController::class,'showmeeting'])->name('showmeeting')->middleware('provider');
        Route::get('/meeting/{id}', [App\Http\Controllers\Provider\MeetingController::class,'acceptmeeting'])->name('acceptmeeting')->middleware('provider');
        Route::get('/message', [App\Http\Controllers\Provider\MeetingController::class,'showmessage'])->name('showmessage')->middleware('provider');
        Route::post('/message/{id}', [App\Http\Controllers\Provider\MeetingController::class,'sendmessage'])->name('sendmessage')->middleware('provider');





    });


});

