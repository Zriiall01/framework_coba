<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
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
    return view('welcome');
});

//Login

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'Login']);
});

//middleware

Route::middleware(['auth'])->group (function(){


//dashboard

Route::get('/dashboard', [DashboardController::class, 'index']);

//Mahasiswa

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/Tambah_mahasiswa', [MahasiswaController::class, 'tambah']);

Route::post('/Tambah_mahasiswa', [MahasiswaController::class, 'tambah_action']);

Route::post('/upload', [MahasiswaController::class, 'upload'])->name('ckeditor.upload');

Route::get('/Edit_mahasiswa/{id}/Edit', [MahasiswaController::class, 'Edit']);

Route::post('/Edit_mahasiswa/{id}/Edit', [MahasiswaController::class, 'Edit_action']);

Route::get('/Hapus_mahasiswa/{id}/Edit', [MahasiswaController::class, 'Hapus']);


//Jurusan

Route::get('/jurusan', [JurusanController::class, 'index']);

Route::get('/Tambah_jrs', [JurusanController::class, 'tambah']);

Route::post('/Tambah_jrs', [JurusanController::class, 'tambah_action']);

Route::get('/Edit_jrs/{id}/Edit', [JurusanController::class, 'Edit']);

Route::post('/Edit_jrs/{id}/Edit', [JurusanController::class, 'Edit_action']);

Route::get('/Hapus_jrs/{id}/Hapus', [JurusanController::class, 'Hapus']);

    
//Logout

Route::get('/logout', [AuthController::class, 'Logout']);

//KurungMiddleware
});