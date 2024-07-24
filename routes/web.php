<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AdministrasiController;
use App\Models\Administrasi;
use App\Models\Dokter;

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

Route::get('/tentang', function () {
    return view('tentang_index');
});

Route::get('/', [PasienController::class, 'registrasi']);

Route::resource('dokter', DokterController::class);
Route::get('dokter/cari/data', [DokterController::class, 'cari']);
Route::get('administrasi/cari/data', [AdministrasiController::class, 'cari']);

Route::resource('pasien', PasienController::class);
Route::get('pasien/cari/data', [PasienController::class, 'cari']);

Route::get('dokter/laporan/cetak', [DokterController::class, 'laporan']);

Route::get('pasien/laporan/cetak', [PasienController::class, 'laporan']);

Route::resource('administrasi', AdministrasiController::class);
Route::get('administrasi/laporan/cetak', [AdministrasiController::class, 'laporan']);

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
