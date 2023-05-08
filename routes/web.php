<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\ExcelController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/pages/{slug}', [HomeController::class, 'pages'])->name('pages');



//excel
Route::get('/exportUsers', [ExcelController::class, 'exportUsers'])->name('exportUsers');
Route::get('/importUsersView', [ExcelController::class, 'importUsersView'])->name('importUsersView');
Route::post('/importUsers', [ExcelController::class, 'importUsers'])->name('importUsers');