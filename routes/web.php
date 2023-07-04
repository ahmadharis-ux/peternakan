<?php

use Carbon\Carbon;
use App\Models\Kas;
use App\Models\User;
use App\Models\Debit;
use App\Models\Pakan;
use App\Models\Rekening;
use Barryvdh\DomPDF\PDF;
use Carbon\CarbonPeriod;
use App\Models\Pembayaran;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\PembelianSapi;
use App\Models\PenjualanSapi;
use App\Models\PemakaianPakan;
use App\Models\TransaksiDebit;
use App\Models\TransaksiKredit;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupSapiController;
use App\Http\Controllers\CustomerController;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\accounting\SapiController;
use App\Http\Controllers\accounting\UserController;
use App\Http\Controllers\accounting\DebitController;
use App\Http\Controllers\accounting\PakanController;
use App\Http\Controllers\accounting\PriveController;
use App\Http\Controllers\accounting\JurnalController;
use App\Http\Controllers\accounting\KreditController;
use App\Http\Controllers\accounting\InvoiceController;
use App\Http\Controllers\accounting\TabunganController;

use App\Http\Controllers\accounting\AccountingController;
use App\Http\Controllers\accounting\KodeJurnalController;
use App\Http\Controllers\accounting\PenggajianController;

use App\Http\Controllers\accounting\PembelianSapiController;
use App\Http\Controllers\accounting\PenjualanSapiController;
use App\Http\Controllers\accounting\PemakaianPakanController;


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

// REDIRECT HOME KE DASHBOARD ACCOUNTING
// Route::get("/home", function () {
//     return redirect('/acc/');
// });

// testpage
Route::get('/test', function (Request $request) {
    // $link = Storage::url(auth()->user()->foto_ttd);
    // return view('test', ['link' => $link]);

    return Storage::url(auth()->user()->foto_ttd);
});



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

        //detail total saldo dan aset
        Route::get('/total_saldo', [AccountingController::class, 'detailSaldoDanAset']);

        //detail hutang
        Route::get('/rincian_hutang', [AccountingController::class, 'RincianHutangPerusahaan']);

        //detail putang
        Route::get('/rincian_piutang', [AccountingController::class, 'RincianPiutangPerusahaan']);

        // Kas
        Route::get('/kas', [AccountingController::class, 'kas']);

        // Hutang
        Route::prefix('hutang')->group(function () {
            Route::get('/', [PembelianSapiController::class, 'index']);
            Route::get('/{id}', [PembelianSapiController::class, 'show']);

            Route::post('/', [PembelianSapiController::class, 'store']);
            Route::post('/detail', [PembelianSapiController::class, 'storeDetail']);
            Route::post('/operasional', [PembelianSapiController::class, 'storeOperasional']);
            Route::post('/transaksi', [KreditController::class, 'storeTransaksi']);
            Route::post('/{pembelianSapi}/invoice', [PembelianSapiController::class, 'invoice']);
        });

        // Piutang
        Route::prefix('piutang')->group(function () {
            Route::get('/', [PenjualanSapiController::class, 'index']);
            Route::get('/{id}', [PenjualanSapiController::class, 'show']);
            Route::post('/detail', [PenjualanSapiController::class, 'storeDetail']);

            Route::post('/', [PenjualanSapiController::class, 'store']);
            Route::post('/detail', [PenjualanSapiController::class, 'storeDetail']);
            Route::post('/operasional', [PenjualanSapiController::class, 'storeOperasional']);
            Route::post('/transaksi', [DebitController::class, 'storeTransaksi']);
            Route::post('/{penjualanSapi}/invoice', [PenjualanSapiController::class, 'invoice']);
        });

        // Gaji
        Route::prefix('gaji')->group(function () {
            Route::get('/', [PenggajianController::class, 'index']);
            Route::get('/pekerja/{id}', [PenggajianController::class, 'showPenggajianPekerja']);
            Route::get('/{id}', [PenggajianController::class, 'show']);

            Route::post('/', [PenggajianController::class, 'store']);
            Route::post('/transaksi', [KreditController::class, 'storeTransaksi']);
        });

        // Tabungan
        Route::prefix('tabungan')->group(function () {
            Route::get('/', [TabunganController::class, 'index']);
            Route::post('/', [TabunganController::class, 'store']);
        });

        //Kode Jurnal
        Route::prefix('kodejurnal')->group(function () {
            Route::get('/', [KodeJurnalController::class, 'index']);
            Route::post('/', [KodeJurnalController::class, 'store']);
            Route::put('/{id}', [KodeJurnalController::class, 'edit']);
            Route::delete('/delete/{id}', [KodeJurnalController::class, 'destroy']);
        });

        // Jurnal
        Route::prefix('jurnal')->group(function () {
            Route::get('/', [JurnalController::class, 'index']);
            Route::get('/{id}', [JurnalController::class, 'show']);

            Route::post('/', [JurnalController::class, 'store']);
            Route::put('/{id}', [JurnalController::class, 'update']);
            Route::delete('/{id}', [JurnalController::class, 'destroy']);
        });


        // Sapi
        Route::prefix('sapi')->group(function () {
            Route::get('/', [SapiController::class, 'index']);
            Route::get('/{sapi}', [SapiController::class, 'show']);

            // Route::post('/', [SapiController::class, 'store']);
            Route::put('/{sapi}/ambil', [SapiController::class, 'setAmbilSapi']);
            Route::put('/{id}', [SapiController::class, 'update']);
            // Route::delete('/{id}', [SapiController::class, 'destroy']);

        });

        // prive
        Route::prefix('prive')->group(function () {
            Route::get('/', [PriveController::class, 'index']);
            Route::post('/', [PriveController::class, 'store']);
        });

        // Pakan
        Route::prefix('pakan')->group(function () {
            Route::get('/', [PakanController::class, 'index']);
            Route::post('/', [PakanController::class, 'store']);

            Route::get('/{id}', [PakanController::class, 'showDetail']);
            Route::post('/detail', [PakanController::class, 'storeDetailPembelianPakan']);
            Route::post('/satuan', [PakanController::class, 'storeSatuan']);
            Route::post('/pembelian', [PakanController::class, 'storePembelianPakan']);
            Route::post('/operasional', [PakanController::class, 'storeOperasional']);
            Route::post('/{pembelianPakan}', [PakanController::class, 'invoice']);
            Route::post('/{pembelianPakan}/invoice', [PakanController::class, 'invoice']);
        });



        // USER
        Route::prefix('user')->group(function () {
            Route::get('/{role}', [UserController::class, 'index']);
            Route::get('/{id}/detail', [UserController::class, 'show']);
            Route::get('/{id}/detail/akuntan', [UserController::class, 'showLogActivity']);

            // customer
            Route::get('/{idUser}/piutang/{idDebit}', [UserController::class, 'showPiutang']);

            // supplier sapi / pakan
            Route::get('/{idUser}/hutang/{idKredit}', [UserController::class, 'showHutang']);


            Route::post('/', [UserController::class, 'store']);
            Route::put('/{id}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
        });

        // Pemakaian pakan
        Route::prefix('pemakaian_pakan')->group(function () {
            Route::get('/', [PemakaianPakanController::class, 'index']);
            Route::get('/create', [PemakaianPakanController::class, 'create']);
            Route::get('/{pemakaianPakan}', [PemakaianPakanController::class, 'show']);

            Route::post('/', [PemakaianPakanController::class, 'store']);
        });

        // invoice
        Route::post('invoice/print', [InvoiceController::class, 'print']);
    });
});


// rute biasa==================================

Route::middleware('auth')->group(function () {
    Route::post('/changepass', [LoginController::class, 'changePassword']);
    Route::post('/logout', [LoginController::class, 'logout']);


    Route::post('test', function () {
        return view('test_faktur');
    });
});


Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/editprofile', [ProfileController::class, 'edit'])->middleware('auth');
Route::put('/updateprofile', [ProfileController::class, 'update'])->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/post_registration', [DaftarController::class, 'store']);


Route::get('/kabur', [LoginController::class, 'logout']);
Route::get('/blank', function () {
    return view('blank');
});
