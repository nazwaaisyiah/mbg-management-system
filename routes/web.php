<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MonitoringController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Sekolah\DashboardController as SekolahDashboard;
use App\Http\Controllers\Sekolah\PesananHarianController;
use App\Http\Controllers\Sekolah\KritikSaranController;
use App\Http\Controllers\Dapur\DashboardController as DapurDashboard;
use App\Http\Controllers\Dapur\MenuController;
use App\Http\Controllers\Dapur\ProduksiController;
use App\Http\Controllers\Dapur\JadwalMenuController;
use App\Http\Controllers\Kurir\DashboardController as KurirDashboard;
use App\Http\Controllers\Kurir\KurirController;
use App\Http\Controllers\Kurir\PengirimanController;
use App\Http\Controllers\Kurir\TrackingController;
use App\Http\Controllers\Gudang\DashboardController as GudangDashboard;
use App\Http\Controllers\Gudang\BahanController;
use App\Http\Controllers\Gudang\PembelianController;
use App\Http\Controllers\Gudang\PermintaanBahanController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('monitoring', MonitoringController::class);
        Route::resource('laporan', LaporanController::class);
    });

    // Sekolah Routes
    Route::middleware('role:sekolah')->prefix('sekolah')->name('sekolah.')->group(function () {
        Route::get('/dashboard', [SekolahDashboard::class, 'index'])->name('dashboard');
        Route::resource('pesanan_harian', PesananHarianController::class);
        Route::resource('kritik_saran', KritikSaranController::class);
    });

    // Dapur Routes
    Route::middleware('role:dapur')->prefix('dapur')->name('dapur.')->group(function () {
        Route::get('/dashboard', [DapurDashboard::class, 'index'])->name('dashboard');
        Route::resource('menu', MenuController::class);
        Route::resource('produksi', ProduksiController::class);
        Route::resource('jadwal_menu', JadwalMenuController::class);
    });

    // Kurir Routes
    Route::middleware('role:kurir')->prefix('kurir')->name('kurir.')->group(function () {
        Route::get('/dashboard', [KurirDashboard::class, 'index'])->name('dashboard');
        Route::resource('kurir', KurirController::class);
        Route::resource('pengiriman', PengirimanController::class);
        Route::resource('tracking', TrackingController::class);
        Route::get('/tracking/{pengirimanId}/show', [TrackingController::class, 'show'])->name('tracking.show');
    });

    // Gudang Routes
    Route::middleware('role:gudang')->prefix('gudang')->name('gudang.')->group(function () {
        Route::get('/dashboard', [GudangDashboard::class, 'index'])->name('dashboard');
        Route::resource('bahan', BahanController::class);
        Route::resource('pembelian', PembelianController::class);
        Route::resource('permintaan_bahan', PermintaanBahanController::class);
    });
});
