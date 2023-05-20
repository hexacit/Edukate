<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\website\HomeController;

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
Route::get('/admin/home', [AdminController::class, 'adminHome'])->name('adminHome');
Route::get('/admin/login', [AdminController::class, 'login'])->name('adminLogin');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/pages/{slug}', [HomeController::class, 'pages'])->name('pages');
Route::get('/course/{id}', [HomeController::class, 'course'])->name('course');

Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::Post('/signupPost', [UserController::class, 'signupPost'])->name('signupPost');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/forgetpassword', [UserController::class, 'forgetpassword'])->name('forgetpassword');
Route::Post('/forgetpasswordPost', [UserController::class, 'forgetpasswordPost'])->name('forgetpasswordPost');
Route::Post('/loginPost', [UserController::class, 'loginPost'])->name('loginPost');


Route::group(['middleware' => ['auth']], function () {
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
Route::post('/updateMyProfile', [UserController::class, 'updateMyProfile'])->name('updateMyProfile');
Route::get('/editpassword', [UserController::class, 'editpassword'])->name('editpassword');
Route::post('/editpasswordPost', [UserController::class, 'editpasswordPost'])->name('editpasswordPost');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');



});


