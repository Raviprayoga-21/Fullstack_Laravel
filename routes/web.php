<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiKaryawanController;
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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DetailTransaksiController;
use App\Models\Menu;

//get

//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLoginPost');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//get
Route::get('get-chart-data', [DataController::class, 'getDataChart']);
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/chart', [DataController::class, 'index'])->name('chart.index');
    Route::get('nota', [HomeController::class, 'index']);
    Route::get('/nota/{nofaktur}', [TransaksiController::class, 'faktur']);
    Route::get('/tentangaplikasi', function () { return view('tentangaplikasi.index');});
    Route::get('export/produktitipan', [ProdukTitipanController::class, 'exportData'])->name('export-produk');
    Route::post('import/produktitipan', [ProdukTitipanController::class, 'importData'])->name('import-produk');
    Route::post('/cetak.produktitipan', [ProdukTitipanController::class, 'cetakProdukTitipan'])->name('cetak-produk');

    Route::group(['middleware'=>['cekUserLogin:1']], function(){
        Route::get('/', [HomeController::class, 'index']);
        //Kategori
        Route::resource('/kategori', KategoriController::class);
        Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('export-kategori');
        Route::post('import/kategori', [KategoriController::class, 'importData'])->name('import-kategori');
        //jenis
        Route::resource('/jenis', JenisController::class);
        Route::get('export/jenis', [JenisController::class, 'exportData'])->name('export-jenis');
        Route::post('import/jenis', [JenisController::class, 'importData'])->name('import-jenis');
        //stok
        Route::resource('/stok', StokController::class);  
        Route::post('/update-stok', [StokController::class, 'updateStok'])->name('update-stok');
        Route::get('export/stok', [StokController::class, 'exportData'])->name('export-stok');
        Route::post('import/stok', [StokController::class, 'importData'])->name('import-stok');
        //menu
        Route::resource('/menu', MenuController::class);
        Route::get('export/menu', [MenuController::class, 'exportData'])->name('export-menu');
        Route::post('import/menu', [MenuController::class, 'importData'])->name('import-menu');
        // Absensi Karyawan
        Route::resource('/absensikaryawan', AbsensiKaryawanController::class);
        Route::get('export/absensikaryawan', [AbsensiKaryawanController::class, 'exportData'])->name('export-absensikaryawan');
        Route::post('import/absensikaryawan', [AbsensiKaryawanController::class, 'importData'])->name('import-absensikaryawan');
        //produk titipan
       // Route::resource('/produktitipan', ProdukTitipanController::class); 
        });
        Route::group(['middleware'=>['cekUserLogin:2']], function(){
            //pelanggan
            Route::resource('/pelanggan', PelangganController::class);
            Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('export-pelanggan');
            Route::post('import/pelanggan', [PelangganController::class, 'importData'])->name('import-pelanggan');
            //pemesanan
            Route::resource('/pemesanan', PemesananController::class);
            //meja
            Route::resource('/meja', MejaController::class);
            Route::get('export/meja', [MejaController::class, 'exportData'])->name('export-meja');
            Route::post('import/meja', [MejaController::class, 'importData'])->name('import-meja');
            //nota faktur
            Route::get('/nota/{nofaktur}', [TransaksiController::class, 'faktur']);
            Route::resource('/transaksi', TransaksiController::class);

            
            //Route::resource('/contact', ContactController::class);
            // Route::resource('/produk', ProdukTitipanController::class);
        });
        Route::group(['middleware'=>['cekUserLogin:3']], function(){
                Route::resource('/laporan', TransaksiController::class);
            Route::get('export/laporan', [TransaksiController::class, 'exportData'])->name('export-laporan');
                
        });
            