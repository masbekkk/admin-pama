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

Route::get('/viding-register', function () {
    //create users
    $curl = curl_init();
    $body['first_name'] = "oke";
    $body['last_name'] = "gas";
    $body['email'] = "oke@coba.com";
    $body['password'] = 'password';
    $body['role'] = 'e0b91f6c-0942-4223-ba74-ea278d912295';
    
    $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
    
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . env('BEARER_TOKEN') // Replace YOUR_TOKEN_HERE with the actual token
    );
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://cms.viding.org/users',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $jsonBody,
        CURLOPT_HTTPHEADER => $headers,
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $ret = json_decode($response);

    dd($ret->data->id);
    
});

Route::get('/viding-login', function () {
    //login
    $curl = curl_init();
   
    $body['email'] = "oke@oke.com";
    $body['password'] = 'password';
    
    $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
    
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . env('BEARER_TOKEN') // Replace YOUR_TOKEN_HERE with the actual token
    );
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://cms.viding.org/auth/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $jsonBody,
        CURLOPT_HTTPHEADER => $headers,
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    echo $response;
    
})->name('/viding');

Route::get('/', function() {
    // return view('coba');
    return redirect()->route('dashboard');
})->name('/');

Route::get('/new-pdf-html', [ExportPDFController::class, 'index']);

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

    Route::resource('users', UserController::class)->middleware('admin');
    Route::get('data/users', [UserController::class, 'getUsers'])->name('get.users');

    Route::get('admin/profile', [UserController::class, 'showAdminProfile'])->name('show.admin');
    Route::put('admin/profile/update', [UserController::class, 'updateAdminProfile'])->name('update.admin');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
