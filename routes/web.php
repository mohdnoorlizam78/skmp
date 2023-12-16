<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PelajarController;
use App\Http\Controllers\StatusKebenaranController;
use App\Http\Controllers\KeluarMasukController;
use App\Http\Controllers\TujuanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SesiMasukController;


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

// untuk mengarahkan pengguna yang telah login
Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('tidakbolehAkses:4');
    //kursus
    Route::get('kursus', [KursusController::class, 'index'])->name('kursus.index')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::post('/kursus/store', [KursusController::class, 'store'])->name('kursus.store')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/kursus/edit/{id}', [KursusController::class, 'edit'])->name('kursus.edit')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/kursus/update/{id}', [KursusController::class, 'update'])->name('kursus.update')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::delete('/kursus/destroy/{id}', [KursusController::class, 'destroy'])->name('kursus.destroy')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    // sesi masuk
    Route::get('sesimasuk', [SesiMasukController::class, 'index'])->name('sesimasuk.index')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::post('/sesimasuk/store', [SesiMasukController::class, 'store'])->name('sesimasuk.store')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/sesimasuk/edit/{id}', [SesiMasukController::class, 'edit'])->name('sesimasuk.edit')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/sesimasuk/update/{id}', [SesiMasukController::class, 'update'])->name('sesimasuk.update')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::delete('/sesimasuk/destroy/{id}', [SesiMasukController::class, 'destroy'])->name('sesimasuk.destroy')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    //pelajar
    Route::get('pelajar', [PelajarController::class, 'index'])->name('pelajar.index')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/pelajar/create', [PelajarController::class, 'create'])->name('pelajar.create')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::post('/pelajar/store', [PelajarController::class, 'store'])->name('pelajar.store')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/pelajar/edit/{id}', [PelajarController::class, 'edit'])->name('pelajar.edit')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/pelajar/update/{id}', [PelajarController::class, 'update'])->name('pelajar.update')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::delete('/pelajar/destroy/{id}', [PelajarController::class, 'destroy'])->name('pelajar.destroy')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/pelajar/info/{id}', [PelajarController::class, 'info'])->name('pelajar.info');
    Route::post('/pelajar/storepengguna', [PelajarController::class, 'storePengguna'])->name('pelajar.storePengguna')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    //permohonan pelajar
    Route::get('/statuskebenaran/', [StatusKebenaranController::class, 'index'])->name('statuskebenaran.index')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::post('/statuskebenaran/store', [StatusKebenaranController::class, 'store'])->name('statuskebenaran.store')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/statuskebenaran/edit/{id}', [StatusKebenaranController::class, 'edit'])->name('statuskebenaran.edit')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/statuskebenaran/update/{id}', [StatusKebenaranController::class, 'update'])->name('statuskebenaran.update')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::delete('/statuskebenaran/destroy/{id}', [StatusKebenaranController::class, 'destroy'])->name('statuskebenaran.destroy')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    // keluar-masuk pelajar
    Route::get('/keluarmasuk', [KeluarMasukController::class, 'index'])->name('keluarmasuk.index')->middleware(['tidakbolehAkses:1', 'tidakbolehAkses:2', 'tidakbolehAkses:4']);
    Route::get('/keluarmasuk/mohonkeluar', [KeluarMasukController::class, 'mohonkeluar'])->name('keluarmasuk.mohonkeluar')->middleware(['tidakbolehAkses:1', 'tidakbolehAkses:2', 'tidakbolehAkses:3']); //pelajar mohon keluar
    Route::post('/keluarmasuk/simpanmohonkeluar', [KeluarMasukController::class, 'simpanmohonkeluar'])->name('keluarmasuk.simpanmohonkeluar')->middleware(['tidakbolehAkses:1', 'tidakbolehAkses:2', 'tidakbolehAkses:3']); //simpan mohon keluar
    Route::post('/keluarmasuk/simpanmohonbalik', [KeluarMasukController::class, 'simpanmohonbalik'])->name('keluarmasuk.simpanmohonbalik')->middleware(['tidakbolehAkses:1', 'tidakbolehAkses:2', 'tidakbolehAkses:3']); //simpan mohon balik
    Route::post('/keluarmasuk/simpanmohonklinik', [KeluarMasukController::class, 'simpanmohonklinik'])->name('keluarmasuk.simpanmohonklinik')->middleware(['tidakbolehAkses:1', 'tidakbolehAkses:2', 'tidakbolehAkses:3']); //simpan mohon klinik
    Route::get('/keluarmasuk/semakpermohonan', [KeluarMasukController::class, 'semakPermohonan'])->name('keluarmasuk.semakpermohonan')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/keluarmasuk/updatemohon/{id}', [KeluarMasukController::class, 'updatemohon'])->name('keluarmasuk.updatemohon')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    Route::post('/keluarmasuk/store', [KeluarMasukController::class, 'store'])->name('keluarmasuk.store')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/keluarmasuk/editmohon/{id}', [KeluarMasukController::class, 'editmohon'])->name('keluarmasuk.editmohon')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/keluarmasuk/sahkanmohon/{id}', [KeluarMasukController::class, 'sahkanmohon'])->name('keluarmasuk.sahkanmohon')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/keluarmasuk/update/{id}', [KeluarMasukController::class, 'update'])->name('keluarmasuk.update')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::delete('/keluarmasuk/destroy/{id}', [KeluarMasukController::class, 'destroy'])->name('keluarmasuk.destroy')->middleware(['tidakbolehAkses:3']);
    Route::get('/keluarmasuk/editkeluar/{id}', [KeluarMasukController::class, 'editkeluar'])->name('keluarmasuk.editkeluar')->middleware(['tidakbolehAkses:1', 'tidakbolehAkses:2', 'tidakbolehAkses:4']);
    Route::patch('/keluarmasuk/updatekeluar/{id}', [KeluarMasukController::class, 'updatekeluar'])->name('keluarmasuk.updatekeluar')->middleware(['tidakbolehAkses:1', 'tidakbolehAkses:2', 'tidakbolehAkses:4']);
    Route::get('/keluarmasuk/editmasuk/{id}', [KeluarMasukController::class, 'editmasuk'])->name('keluarmasuk.editmasuk')->middleware(['tidakbolehAkses:1', 'tidakbolehAkses:2', 'tidakbolehAkses:4']);
    Route::patch('/keluarmasuk/updatemasuk/{id}', [KeluarMasukController::class, 'updatemasuk'])->name('keluarmasuk.updatemasuk')->middleware(['tidakbolehAkses:1', 'tidakbolehAkses:2', 'tidakbolehAkses:4']);
    Route::get('/keluarmasuk/rekodpenuh', [KeluarMasukController::class, 'rekodpenuh'])->name('keluarmasuk.rekodpenuh')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    //tujuan
    Route::get('/tujuan/', [TujuanController::class, 'index'])->name('tujuan.index')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::post('/tujuan/store', [TujuanController::class, 'store'])->name('tujuan.store')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/tujuan/edit/{id}', [TujuanController::class, 'edit'])->name('tujuan.edit')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/tujuan/update/{id}', [TujuanController::class, 'update'])->name('tujuan.update')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::delete('/tujuan/destroy/{id}', [TujuanController::class, 'destroy'])->name('tujuan.destroy')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    //pengguna
    Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/user/pentadbir', [UserController::class, 'pentadbir'])->name('user.pentadbir')->middleware(['tidakbolehAkses:2', 'tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/user/infopengguna/{id}', [UserController::class, 'infopengguna'])->name('user.infopengguna');
    Route::patch('/user/updatepelajar/{id}', [UserController::class, 'updatepelajar'])->name('user.updatepelajar');

    Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/user/editinfo/{id}', [UserController::class, 'editinfo'])->name('user.editinfo');
    Route::patch('/user/updateinfo/{id}', [UserController::class, 'updateinfo'])->name('user.updateinfo');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
});
