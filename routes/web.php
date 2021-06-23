<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
});

Route::get('/test', function () {
    return view('tailwindtest');
});








//todo-----------------------------------__COURSES__------------------------------------------\
Route::resource('course',CourseController::class);








Auth::routes(['verify' => true]);



Route::get('/login/admin', [LoginController::class,'showAdminLoginForm'])->name('admin.login');
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);


//Route::view('/home', 'home')->middleware('auth');
//Route::view('/admin', 'admin');


Route::group(['middleware' => 'auth:admin'], function () {

    Route::view('/admin', 'admin');
});
Route::get('logout', [LoginController::class,'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
