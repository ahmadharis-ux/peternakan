<?php

use App\Http\Controllers\AccController;
use App\Http\Controllers\accounting\AccountingController;
use App\Http\Controllers\accounting\DebitController;
use App\Http\Controllers\accounting\KreditController;
use App\Http\Controllers\accounting\PakanController;
use App\Http\Controllers\accounting\PembelianSapiController;
use App\Http\Controllers\accounting\PenjualanSapiController;
use App\Http\Controllers\accounting\UserController;
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
use App\Models\PembelianSapi;
use App\Models\PenjualanSapi;
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


// ================================ OWNER
Route::middleware(['auth', 'role:Owner'])->group(function () {
    Route::get('/owner', [OwnerController::class, 'index']);
});

// ================================ ADMIN
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::put('/editrole/{id}', [AdminController::class, 'editRole']);
});

// ================================ ACCOUNTING
Route::middleware(['auth', 'role:Accounting'])->group(function () {
    Route::prefix('acc')->group(function () {

        Route::get('/', [AccountingController::class, 'index']);

        // PEMBUKUAN
        Route::get('/kas');

        // hutang = pembelian sapi
        Route::prefix('hutang')->group(function () {
            Route::get('/', [PembelianSapiController::class, 'index']);
            Route::get('/{id}', [PembelianSapiController::class, 'show']);

            Route::post('/', [PembelianSapiController::class, 'store']);
        });

        //piutang = penjualan sapi
        Route::prefix('piutang')->group(function () {
            Route::get('/', [PenjualanSapiController::class, 'index']);
            Route::get('/{id}', [PenjualanSapiController::class, 'show']);
            // Route::get('/baru', [PenjualanSapiController::class, 'create']);

            Route::post('/', [PenjualanSapiController::class, 'store']);
        });
        


        Route::get('/pakan', [PakanController::class, 'index']);
        Route::get('/gaji');
        Route::get('/prive');
        Route::get('/servis_mobil');

        // USER
        Route::get('/user/{role}', [UserController::class, 'index']);
    });






    // // Route::get('/acc/kas', [AccController::class, 'indexKas']);
    // Route::post('/storekas', [AccController::class, 'storeKas']);
    // Route::get('/detail/kas/{jurnal_id}/{id}', [AccController::class, 'detKas']);

    // Route::post('/storesapis', [AccController::class, 'storesapis']);

    // Route::post('/storeopr', [AccController::class, 'storeopr']);
    // Route::post('/storetrans', [AccController::class, 'storetrans']);
    // Route::post('/storepiutang', [AccController::class, 'storepiutang']);

    // //stok sapi
    // Route::get('/stoksapis', [AccController::class, 'stoksapis']);

    // //update status sapi
    // Route::put('/editstatus/{id}', [AccController::class, 'editstatus']);

    // //total hutang
    // Route::get('/total_hutang', [AccController::class, 'allhutang']);

    // //pakan
    // // Route::get('/acc/pakans', [AccController::class, 'indexpakans']);
    // Route::post('/storepakans', [AccController::class, 'storepakans']);
    // Route::post('/belipakans', [AccController::class, 'belipakans']);
    // Route::post('/pemakaianpakans', [AccController::class, 'pemakaianpakans']);

    // //hutang
    // // Route::get('/acc/hutang', [AccController::class, 'indexhutang']);

    // //piutang
    // // Route::get('/acc/piutang', [AccController::class, 'indexpiutang']);

    // //gaji
    // Route::post('/inputsalary', [AccController::class, 'storesalary']);
    // Route::post('/kasihkasbon', [AccController::class, 'storekashbon']);
    // // Route::get('/acc/pekerja', [PekerjaController::class, 'index']);
    // // Route::get('/acc/pekerja/{id}', [PekerjaController::class, 'detail_pekerja']);

    // //customer
    // // Route::get('/acc/customer', [CustomerController::class, 'index']);
    // // Route::get('/acc/customer/{id}', [CustomerController::class, 'detail']);

    // //suppliersapi
    // // Route::get('/acc/supsapis', [SupSapiController::class, 'index']);

    // //faktur
    // Route::get('/faktur/{id}', [PDFController::class, 'fakturcust']);
});


// rute biasa==================================


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

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/post_registration', [DaftarController::class, 'store']);

Route::post('/changepass', [LoginController::class, 'changePassword']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/kabur', [LoginController::class, 'logout']);
Route::get('/blank', function () {
    return view('blank');
});
