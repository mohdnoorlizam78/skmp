<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\KursusTahfizController;
use App\Http\Controllers\KursusTvetController;
=======
use App\Http\Controllers\LaranganController;
>>>>>>> 0a3915b1d31e37fd10cc8a5d329f46920ed0ffb2
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SesiMasukController;
use App\Http\Controllers\TahfizController;
use App\Http\Controllers\TvetController;

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

// untuk mengarahkan pengguna ke laman utama
Route::get('/', function () {
    return redirect('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('tidakbolehAkses:4');
<<<<<<< HEAD

=======
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

    Route::get('/pelajar/addgambar', [PelajarController::class, 'createGambar'])->name('pelajar.creategambar')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::post('/pelajar/gambar', [PelajarController::class, 'gambar'])->name('pelajar.gambar')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

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
    Route::get('/keluarmasuk/lulus-semua', [KeluarMasukController::class, 'lulusSemua'])->name('keluarmasuk.lulus-semua')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    // warden melarang keluar
    Route::get('/warden', [LaranganController::class, 'index'])->name('warden.index')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/warden/edit/{id}', [LaranganController::class, 'edit'])->name('warden.edit')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::post('/warden/store', [LaranganController::class, 'store'])->name('warden.store')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/warden/update/{id}', [LaranganController::class, 'update'])->name('warden.update')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::delete('/warden/destroy/{id}', [LaranganController::class, 'destroy'])->name('warden.destroy')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    //tujuan
    Route::get('/tujuan/', [TujuanController::class, 'index'])->name('tujuan.index')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::post('/tujuan/store', [TujuanController::class, 'store'])->name('tujuan.store')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::get('/tujuan/edit/{id}', [TujuanController::class, 'edit'])->name('tujuan.edit')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::patch('/tujuan/update/{id}', [TujuanController::class, 'update'])->name('tujuan.update')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
    Route::delete('/tujuan/destroy/{id}', [TujuanController::class, 'destroy'])->name('tujuan.destroy')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);
>>>>>>> 0a3915b1d31e37fd10cc8a5d329f46920ed0ffb2

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

    //senarai kursus sepenuh masa
    Route::get('kursus_penuh', [KursusTvetController::class, 'index'])->name('kursus_penuh.index');
    Route::post('/kursus_penuh/store', [KursusTahfizController::class, 'store'])->name('kursus_penuh.store');
    Route::get('/kursus_penuh/edit/{id}', [KursusTahfizController::class, 'edit'])->name('kursus_penuh.edit');
    Route::patch('/kursus_penuh/update/{id}', [KursusTahfizController::class, 'update'])->name('kursus_penuh.update');
    Route::delete('/kursus_penuh/destroy/{id}', [KursusTahfizController::class, 'destroy'])->name('kursus_penuh.destroy');

    //senarai mohon sepenuh masa
    Route::get('tvet/senarai_mohon', [TvetController::class, 'senarai_mohon'])->name('tvet.senarai_mohon')->middleware(['tidakbolehAkses:3', 'tidakbolehAkses:4']);

    //senarai kursus tvet tahfiz
    Route::get('kursus_tahfiz', [KursusTahfizController::class, 'index'])->name('kursus_tahfiz.index');
    Route::post('/kursus_tahfiz/store', [KursusTahfizController::class, 'store'])->name('kursus_tahfiz.store');
    Route::get('/kursus_tahfiz/edit/{id}', [KursusTahfizController::class, 'edit'])->name('kursus_tahfiz.edit');
    Route::patch('/kursus_tahfiz/update/{id}', [KursusTahfizController::class, 'update'])->name('kursus_tahfiz.update');
    Route::delete('/kursus_tahfiz/destroy/{id}', [KursusTahfizController::class, 'destroy'])->name('kursus_tahfiz.destroy');

    //senarai mohon tvet tahfiz
    Route::get('/tvet_tahfiz/senarai_mohon', [TahfizController::class, 'senarai_mohon'])->name('tvet_tahfiz.senarai_mohon');
});

//tvet tahfiz index
Route::get('index', [TahfizController::class, 'index']);
Route::get('/tvet_tahfiz', function () {
    return redirect('/tvet_tahfiz/create');
});

// tvet tahfiz
Route::get('/tvet_tahfiz/create', [TahfizController::class, 'create'])->name('tvet_tahfiz.create');
Route::post('/tvet_tahfiz/store', [TahfizController::class, 'store'])->name('tvet_tahfiz.store');

// sepenuh masa
Route::get('/tvet/create', [TvetController::class, 'create'])->name('tvet.create');
Route::post('/tvet/store', [TvetController::class, 'store'])->name('tvet.store');

//spenuh masa index
Route::get('index', [TvetController::class, 'index']);
Route::get('/tvet', function () {
    return redirect('/tvet/create');
});
