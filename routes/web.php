<?php

use App\Models\Kas;

use App\Models\Role;

use App\Models\User;
use App\Models\Kredit;
use Illuminate\Http\Request;

use App\Models\PembelianSapi;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\DaftarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\owner\OwnerController;
use App\Http\Controllers\owner\RekeningController;
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
use App\Models\Sapi;

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

Route::get('/home', function () {
    if (auth()->user()->id_role == 2) {
        return redirect()->intended('/admin');
    }

    if (auth()->user()->id_role == 3) {
        return redirect()->intended('/acc');
    }

    if (auth()->user()->id_role == 1) {
        return redirect()->intended('/owner');
    }
});



// testpage
Route::get('/testa', function (Request $request) {
});

Route::get('/welcome', function (Request $request) {
    return view('welcome');
});

// ================================ OWNER
Route::middleware(['auth', 'role:Owner'])->prefix('owner')->group(function () {
    Route::get('/', [OwnerController::class, 'index']);

    Route::prefix('/rekening')->group(function () {
        Route::get('/', [RekeningController::class, 'index']);
        Route::post('/', [RekeningController::class, 'store']);
        Route::put('/{rekening}', [RekeningController::class, 'update']);
        Route::delete('/{rekening}', [RekeningController::class, 'destroy']);
    });
});

// ================================ ADMIN
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::prefix('/users')->group(function () {
        Route::get('/', [AdminController::class, 'users']);
        Route::put('/editrole/{user}', [AdminController::class, 'editRole']);
    });

    Route::prefix('/roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        // Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        Route::put('/{role}', [RoleController::class, 'update']);
        Route::delete('/{role}', [RoleController::class, 'destroy']);
    });
});

// ================================ ACCOUNTING
Route::middleware(['auth', 'role:Accounting'])->get('/acc', [AccountingController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/total_saldo', [AccountingController::class, 'detailSaldoDanAset']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/rincian_hutang', [AccountingController::class, 'RincianHutangPerusahaan']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/rincian_piutang', [AccountingController::class, 'RincianPiutangPerusahaan']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/kas', [AccountingController::class, 'kas']);

Route::middleware(['auth', 'role:Accounting'])->get('/acc/hutang', [PembelianSapiController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/hutang/{id}', [PembelianSapiController::class, 'show']);
// Route::middleware(['auth', 'role:Accounting'])->post('/acc/hutang', [PembelianSapiController::class, 'store']);
// Route::middleware(['auth', 'role:Accounting'])->post('/acc/hutang', function (Request $request) {
//     return "hutang baru";
// });
Route::middleware(['auth', 'role:Accounting'])->post('/acc/hutang/detail', [PembelianSapiController::class, 'storeDetail']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/hutang/operasional', [PembelianSapiController::class, 'storeOperasional']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/hutang/transaksi', [KreditController::class, 'storeTransaksi']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/hutang/{pembelianSapi}/invoice', [PembelianSapiController::class, 'invoice']);

Route::middleware(['auth', 'role:Accounting'])->get('/acc/piutang', [PenjualanSapiController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/piutang/{id}', [PenjualanSapiController::class, 'show']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/piutang/detail', [PenjualanSapiController::class, 'storeDetail']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/piutang', [PenjualanSapiController::class, 'store']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/piutang/operasional', [PenjualanSapiController::class, 'storeOperasional']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/piutang/transaksi', [DebitController::class, 'storeTransaksi']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/piutang/{penjualanSapi}/invoice', [PenjualanSapiController::class, 'invoice']);

Route::middleware(['auth', 'role:Accounting'])->get('/acc/gaji', [PenggajianController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/gaji/pekerja/{id}', [PenggajianController::class, 'showPenggajianPekerja']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/gaji/{id}', [PenggajianController::class, 'show']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/gaji', [PenggajianController::class, 'store']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/gaji/transaksi', [KreditController::class, 'storeTransaksi']);

Route::middleware(['auth', 'role:Accounting'])->get('/acc/tabungan', [TabunganController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/tabungan', [TabunganController::class, 'store']);

Route::middleware(['auth', 'role:Accounting'])->get('/acc/kodejurnal', [KodeJurnalController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/kodejurnal', [KodeJurnalController::class, 'store']);
Route::middleware(['auth', 'role:Accounting'])->put('/acc/kodejurnal/{id}', [KodeJurnalController::class, 'edit']);
Route::middleware(['auth', 'role:Accounting'])->delete('/acc/kodejurnal/delete/{id}', [KodeJurnalController::class, 'destroy']);

Route::middleware(['auth', 'role:Accounting'])->get('/acc/jurnal', [JurnalController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/jurnal/{id}', [JurnalController::class, 'show']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/jurnal', [JurnalController::class, 'store']);
Route::middleware(['auth', 'role:Accounting'])->put('/acc/jurnal/{id}', [JurnalController::class, 'update']);
Route::middleware(['auth', 'role:Accounting'])->delete('/acc/jurnal/{id}', [JurnalController::class, 'destroy']);

Route::middleware(['auth', 'role:Accounting'])->get('/acc/sapi', [SapiController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/sapi/{sapi}', [SapiController::class, 'show']);
Route::middleware(['auth', 'role:Accounting'])->put('/acc/sapi/{sapi}/ambil', [SapiController::class, 'setAmbilSapi']);
Route::middleware(['auth', 'role:Accounting'])->put('/acc/sapi/{id}', [SapiController::class, 'update']);

Route::middleware(['auth', 'role:Accounting'])->get('/acc/prive', [PriveController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/prive', [PriveController::class, 'store']);

Route::middleware(['auth', 'role:Accounting'])->get('/acc/pakan', [PakanController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/pakan', [PakanController::class, 'store']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/pakan/{id}', [PakanController::class, 'showDetail']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/pakan/detail', [PakanController::class, 'storeDetailPembelianPakan']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/pakan/satuan', [PakanController::class, 'storeSatuan']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/pakan/pembelian', [PakanController::class, 'storePembelianPakan']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/pakan/operasional', [PakanController::class, 'storeOperasional']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/pakan/{pembelianPakan}', [PakanController::class, 'invoice']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/pakan/{pembelianPakan}/invoice', [PakanController::class, 'invoice']);


Route::middleware(['auth', 'role:Accounting'])->post('/acc/hutang', function () {
    return "hutang baru";
});

Route::middleware(['auth', 'role:Accounting'])->post('/acc/user/', function () {
    return "user baru";
});


Route::middleware(['auth', 'role:Accounting'])->get('/acc/user/{role}', [UserController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/user/{id}/detail', [UserController::class, 'show']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/user/{id}/detail/akuntan', [UserController::class, 'showLogActivity']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/user/{idUser}/piutang/{idDebit}', [UserController::class, 'showPiutang']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/user/{idUser}/hutang/{idKredit}', [UserController::class, 'showHutang']);
// Route::middleware(['auth', 'role:Accounting'])->post('/acc/user/', [UserController::class, 'store']);
Route::middleware(['auth', 'role:Accounting'])->put('/acc/user/{id}', [UserController::class, 'update']);
Route::middleware(['auth', 'role:Accounting'])->delete('/acc/user/{id}', [UserController::class, 'destroy']);



Route::middleware(['auth', 'role:Accounting'])->get('/acc/pemakaian_pakan', [PemakaianPakanController::class, 'index']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/pemakaian_pakan/create', [PemakaianPakanController::class, 'create']);
Route::middleware(['auth', 'role:Accounting'])->get('/acc/pemakaian_pakan/{pemakaianPakan}', [PemakaianPakanController::class, 'show']);
Route::middleware(['auth', 'role:Accounting'])->post('/acc/pemakaian_pakan', [PemakaianPakanController::class, 'store']);

Route::post('/acc/invoice/print', [InvoiceController::class, 'print']);


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
Route::put('/changepass', [ProfileController::class, 'changePassword'])->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/post_registration', [DaftarController::class, 'store']);


Route::get('/kabur', [LoginController::class, 'logout']);
Route::get('/blank', function () {
    return view('blank');
});
