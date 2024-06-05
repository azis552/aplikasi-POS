<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BebanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Models\Penjualan;
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
    return view('login');
})->name('login');
Route::get('register', function () {
    return view('register');
})->name('register');
Route::get('auth/logout',[AuthController::class,'logout'])->name('logout');
Route::resource('auth',AuthController::class);
Route::POST('auth/login',[AuthController::class,'login_check'])->name('auth.login_check');
Route::resource('dashboard',DashboardController::class);
Route::resource('produk',ProdukController::class);
Route::resource('supplier',SupplierController::class);
Route::resource('pembelian',PembelianController::class);
Route::resource('penjualan',PenjualanController::class);
Route::GET('transaksi',[PenjualanController::class,'transaksi'])->name('penjualan.transaksi');
Route::GET('data',[PenjualanController::class,'data_transaksi'])->name('penjualan_transaksi');
Route::GET('nota/{id}/cetak',[PenjualanController::class,'nota'])->name('nota.cetak');
Route::POST('penjualan/simpan',[PenjualanController::class,'simpan'])->name('penjualan.simpan');

Route::GET('penjualan/{id}/batal_session',[PenjualanController::class,'batal_session'])->name('penjualan.batal_session');
Route::GET('penjualan/{id}/tambah',[PenjualanController::class,'tambah_penjualan_sementara'])->name('penjualan_sementara');
Route::GET('penjualan/{id}/hapus_list',[PenjualanController::class,'hapus_list'])->name('penjualan.hapus_list');
Route::resource('beban', BebanController::class);
Route::GET('laporan',[BebanController::class,'labarugi'])->name('laba.rugi');
Route::POST('laporan/cetak',[BebanController::class,'cetak_lr'])->name('cetak_lr');