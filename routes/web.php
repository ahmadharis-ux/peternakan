<?php

use App\Http\Controllers\AccController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\SupSapiController;
use App\Models\Kas;
use App\Models\Pembayaran;
use App\Models\Rekening;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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
//owner
Route::middleware(['auth', 'role:Owner'])->group(function () {
    Route::get('/owner', [OwnerController::class, 'index']);
});

//admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::put('/editrole/{id}', [AdminController::class, 'editRole']);
});

//accounting
Route::middleware(['auth', 'role:Accounting'])->group(function () {
    Route::get('/acc', [AccController::class, 'index']);
    Route::get('/acc/kas', [AccController::class, 'indexKas']);
    Route::post('/storekas', [AccController::class, 'storeKas']);
    Route::get('/detail/kas/{jurnal_id}/{id}', [AccController::class, 'detKas']);
    Route::post('/storesapi', [AccController::class, 'storesapi']);
    Route::post('/storeopr', [AccController::class, 'storeopr']);
    Route::post('/storetrans', [AccController::class, 'storetrans']);
    Route::post('/storepiutang', [AccController::class, 'storepiutang']);

    //stok sapi
    Route::get('/stoksapi', [AccController::class, 'stoksapi']);

    //update status sapi
    Route::put('/editstatus/{id}', [AccController::class, 'editstatus']);

    //total hutang
    Route::get('/total_hutang', [AccController::class, 'allhutang']);

    //pakan
    Route::get('/acc/pakan', [AccController::class, 'indexpakan']);
    Route::post('/storepakan', [AccController::class, 'storepakan']);
    Route::post('/belipakan', [AccController::class, 'beliPakan']);
    Route::post('/pemakaianpakan', [AccController::class, 'pemakaianpakan']);

    //hutang
    Route::get('/acc/hutang', [AccController::class, 'indexhutang']);

    //piutang
    Route::get('/acc/piutang', [AccController::class, 'indexpiutang']);

    //gaji
    Route::post('/inputsalary', [AccController::class, 'storesalary']);
    Route::post('/kasihkasbon', [AccController::class, 'storekashbon']);
    Route::get('/acc/pekerja', [PekerjaController::class, 'index']);
    Route::get('/acc/pekerja/{id}', [PekerjaController::class, 'detail_pekerja']);

    //customer
    Route::get('/acc/customer', [CustomerController::class, 'index']);
    Route::get('/acc/customer/{id}', [CustomerController::class, 'detail']);

    //suppliersapi
    Route::get('/acc/supsapi', [SupSapiController::class, 'index']);

    //faktur
    Route::get('/faktur/{id}', [PDFController::class, 'fakturcust']);
});


Route::get('/profile', function () {
    $title = 'Profile';
    $heading = 'Admin';
    $active = 'profle';
    return view('profile', [
        'title' => $title,
        'heading' => $heading,
        'active' => $active,
    ]);
})->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/post_registration', [DaftarController::class, 'store']);

Route::post('/changepass', [LoginController::class, 'changePassword']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/kabur', [LoginController::class, 'logout']);
Route::get('/blank', function () {
    return view('blank');
});
