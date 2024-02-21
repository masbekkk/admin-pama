<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportPDFController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VDCClaimController;
use App\Http\Controllers\VDCMasterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::get('/', function() {
    // return view('coba');
    return redirect()->route('dashboard');
})->name('/');


Route::get('pdf-from-view', [ExportPDFController::class, 'fromView']);
Auth::routes([
    'register' => false,
]);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('ajax/dashboard', [DashboardController::class, 'getDashboardData'])->name('ajax.dashboard');

    Route::resource('vdc_master', VDCMasterController::class);
    Route::get('data/vdc_master', [VDCMasterController::class, 'getVdcMaster'])->name('get.vdc_master');

    Route::resource('units', UnitController::class);
    Route::get('data/units', [UnitController::class, 'getUnits'])->name('get.units');

    Route::resource('vdc_claim', VDCClaimController::class);
    // ->parameters(['vdc_claim' => 'VDCClaim']);
    Route::get('data/vdc_claim', [VDCClaimController::class, 'getVDCClaim'])->name('get.vdc_claim');
    Route::get('/pdf/vdc_claim/{id}', [ExportPDFController::class, 'index'])->name('pdf.vdc_claim');

    Route::resource('users', UserController::class)->middleware('admin');
    Route::get('data/users', [UserController::class, 'getUsers'])->name('get.users');

    Route::get('admin/profile', [UserController::class, 'showAdminProfile'])->name('show.admin');
    Route::put('admin/profile/update', [UserController::class, 'updateAdminProfile'])->name('update.admin');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
