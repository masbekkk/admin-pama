<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VDCMasterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

Route::resource('vdc_master', VDCMasterController::class)->middleware('auth');
Route::get('data/vdc_master', [VDCMasterController::class, 'getVdcMaster'])->middleware('auth')->name('get.vdc_master');

Route::resource('users', UserController::class)->middleware(['auth', 'admin']);
Route::get('data/users', [UserController::class, 'getUsers'])->middleware('auth')->name('get.users');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
