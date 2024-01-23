<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KursusTahfizController;
use App\Http\Controllers\KursusTvetController;
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
