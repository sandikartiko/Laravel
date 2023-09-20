<?php

use App\Http\Controllers\Alternatif;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\kepController;
use App\Http\Controllers\perhitungan;
use App\Http\Controllers\TwilioSMSController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are load   ed by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/kriteria', function () {
    return view('kriteria/halaman');
});
Route::get('/siswa', function () {
    return view('datasiswa/siswa');
});
Route::get('/nilai', function () {
    return view('datanilai/nilai');
});
Route::get('/perhitungan', function () {
    return view('perhitungan/per');
});
//membuat form login dan hak akses admin dan kepala sekolah
Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

//halaman admin
Route::get('/dash', [Controller::class, 'dash'])->name('dash')->middleware(['auth']);


//halaman kepala sekolah
// Route::get('/dashkep', [kepController::class, 'dashkep'])->name('dashkep')->middleware(['auth','kepala-sekolah']);

//CRUD
//route resource
// Route::resource('kriteria',KriteriaController::class)->middleware(['auth','must-admin']);
Route::resource('subkriteria',SubController::class);

//sebagai kepala sekolah
// Route::resource('kepalasekolah',kepController::class)->middleware(['auth','kepala-sekolah']);

//perhitungan



Route::get('/kriteria', [KriteriaController::class, 'index'])->name('index')->middleware(['auth']);
Route::get('/kriteria/create', [KriteriaController::class, 'create'])->name('create')->middleware(['auth','must-admin']);
Route::get('/kriteria/{id}', [KriteriaController::class, 'show'])->name('show')->middleware(['auth','must-admin']);
Route::get('/bobot', [BobotController::class, 'hitungBobotWP'])->name('hitungBobotWP');
Route::post('/kriteria', [KriteriaController::class, 'store'])->name('store')->middleware(['auth','must-admin']);
Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->name('update')->middleware(['auth','must-admin']);
Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('edit')->middleware(['auth','must-admin']);
Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('destroy')->middleware(['auth','must-admin']);


Route::get('/datasiswa', [siswaController::class, 'index'])->name('index')->middleware(['auth']);
Route::get('/datasiswa/exportPDF', [siswaController::class, 'exportPDF'])->name('exportPDF')->middleware(['auth']);
Route::get('/datasiswa/create', [siswaController::class, 'create'])->name('create')->middleware(['auth','must-admin']);
Route::get('/datasiswa/search', [siswaController::class, 'search'])->name('search')->middleware(['auth']);
Route::get('/datasiswa/{id}', [siswaController::class, 'show'])->name('show')->middleware(['auth','must-admin']);
Route::post('/datasiswa', [siswaController::class, 'store'])->name('store')->middleware(['auth','must-admin']);
Route::put('/datasiswa/{id}', [siswaController::class, 'update'])->name('update')->middleware(['auth','must-admin']);
Route::get('/datasiswa/{id}/edit', [siswaController::class, 'edit'])->name('edit')->middleware(['auth','must-admin']);
Route::delete('/datasiswa/{id}', [siswaController::class, 'destroy'])->name('destroy')->middleware(['auth','must-admin']);


Route::get('/datanilai', [Alternatif::class, 'index'])->name('index')->middleware(['auth']);
Route::get('/datanilai/create', [Alternatif::class, 'create'])->name('create')->middleware(['auth','must-admin']);
Route::get('/datanilai/{id}', [Alternatif::class, 'show'])->name('show')->middleware(['auth','must-admin']);
Route::post('/datanilai', [Alternatif::class, 'store'])->name('store')->middleware(['auth','must-admin']);
Route::put('/datanilai/{id}', [Alternatif::class, 'update'])->name('update')->middleware(['auth','must-admin']);
Route::get('/datanilai/{id}/edit', [Alternatif::class, 'edit'])->name('edit')->middleware(['auth','must-admin']);
Route::delete('/datanilai/{id}', [Alternatif::class, 'destroy'])->name('destroy')->middleware(['auth','must-admin']);
// Route::get('/datanilai', [Alternatif::class, 'calculateNilaiW'])->name('calculateNilaiW')->middleware(['auth']);

// Route::get('/perhitungan', [perhitungan::class, 'index'])->name('index')->middleware(['auth']);
Route::get('/perhitungan/exportPDF', [perhitungan::class, 'exportPDF'])->name('exportPDF')->middleware(['auth']);
Route::get('/perhitungan/hasil', [perhitungan::class, 'hasil'])->name('hasil')->middleware(['auth']);
Route::get('/perhitungan/class', [perhitungan::class, 'class'])->name('class')->middleware(['auth']);
Route::get('/perhitungan/call', [perhitungan::class, 'call'])->name('call')->middleware(['auth']);
Route::get('/perhitungan/kriteria', [perhitungan::class, 'kriteria'])->name('kriteria')->middleware(['auth']);
Route::get('/perhitungan/matriks', [perhitungan::class, 'matriks'])->name('matriks')->middleware(['auth']);
Route::get('/perhitungan/bobotternormalisasi', [perhitungan::class, 'bobotternormalisasi'])->name('bobotternormalisasi')->middleware(['auth']);
Route::get('/perhitungan/vektors', [perhitungan::class, 'vektors'])->name('vektors')->middleware(['auth']);
Route::get('/perhitungan/vektorv', [perhitungan::class, 'vektorv'])->name('vektorv')->middleware(['auth']);
Route::get('/sms', [TwilioSMSController::class, 'index'])->name('index')->middleware(['auth']);
Route::get('/perhitungan/errors', [perhitungan::class, 'errors'])->name('errors')->middleware(['must-admin']);

Route::get('/get-new-siswa-for-alternatif', 'AlternatifController@getNewSiswaForAlternatif');
Route::get('/get-siswa/{id}', 'AlternatifController@getSiswaInfo');





