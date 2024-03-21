<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\UserController;

//get

//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLoginPost');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


//resource   

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/tentangaplikasi', function () { return view('tentangaplikasi.index');});
    Route::get('export/produktitipan', [ProdukTitipanController::class, 'exportData'])->name('export-produk');
    Route::post('import/produktitipan', [ProdukTitipanController::class, 'importData'])->name('import-produk');
    Route::post('/cetak.produktitipan', [ProdukTitipanController::class, 'cetakProdukTitipan'])->name('cetak-produk');

    Route::resource('menu', MenuController::class);
    Route::resource('member', MemberController::class);
    Route::resource('jenis', JenisController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('stok', StokController::class);
    Route::resource('meja', MejaController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('pemesanan', PemesananController::class);
    Route::resource('produktitipan', ProdukTitipanController::class);

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/member', [MemberController::class, 'index'])->name('menu.index');
    Route::get('/jenis', [JenisController::class, 'index'])->name('menu.index');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('menu.index');
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('menu.index');
    Route::get('/stok', [StokController::class, 'index'])->name('menu.index');
    Route::get('/meja', [MejaController::class, 'index'])->name('menu.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('menu.index');
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('menu.index');
    Route::get('/produktitipan', [ProdukTitipanController::class, 'index'])->name('menu.index');
});