<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesAndPermission\PermissionController;
use App\Http\Controllers\RolesAndPermission\RolesController;

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


//todo--------------------------------------_Admin_------------------------------------------
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm']);

Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::get('logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth:admin'], function () {

    Route::resource('admin', AdminController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionController::class);
//todo-----------------------------------__COURSES__------------------------------------------
    Route::resource('course', CourseController::class);

});
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');








