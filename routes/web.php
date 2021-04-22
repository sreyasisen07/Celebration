<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
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
Route::get('eventcategoryproducts', function(){
    return view('profiles.eventcategoryproducts');
})->name('eventcategoryproducts');
Route::get('/customermyprofile', function(){
    return view('profiles.customermyprofile');
})->name('customermyprofile');
Route::get('/providermyprofile', function(){
    return view('profiles.providermyprofile');
})->name('providermyprofile');

Route::get('/reviewpage', function(){
    return view('profiles.reviewpage');
})->name('reviewpage');
Route::get('/customerviewingproviderpage', function(){
    return view('profiles.customerviewingproviderpage');
})->name('customerviewingproviderpage');

Route::get('/review',[ReviewController::class,'index'])->name('review');
Route::post('/review',[ReviewController::class,'store']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('about', [HomeController::class, 'about'])->name('about');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
