<?php

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

Route::get('/', function () {
    // dd(getClearNumberFromStringCurrency("Rp9.436.095,00"));
    return redirect()->route('vdc_master.index');
})->name('/');

Route::get('/form-claim', function () {
    $judul = 'CLAIM OF WARRANTY PROPOSAL';
    return view('form_claim', compact('judul'));
});

Route::get('/pdf-form-claim', function () {
    $judul = 'CLAIM OF WARRANTY PROPOSAL';
    $view = View::make('form_claim', compact('judul'));
    $html = $view->render();

    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 6);
    $obj_pdf->AddPage();
    $obj_pdf->writeHTML($html, true, false, true, false, '');
    ob_clean();
    $obj_pdf->Output('form_claim.pdf');
});

Route::get('/form-claim2', function () {
    $judul = 'CLAIM OF WARRANTY PROPOSAL';
    return view('form_claim', compact('judul'));
});

Route::get('/pdf-form-claim2', function () {
    $judul = 'CLAIM OF WARRANTY PROPOSAL';
    $view = View::make('form_claim2', compact('judul'));
    $html = $view->render();

    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 6);
    $obj_pdf->AddPage();
    $obj_pdf->writeHTML($html, true, false, true, false, '');
    ob_clean();
    $obj_pdf->Output('form_claim.pdf');
});

Auth::routes([
    'register' => false,
]);

Route::middleware('auth')->group(function () {
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
