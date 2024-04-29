<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;   
use App\Http\Controllers\Login\RegisterController;   
use App\Http\Controllers\Login\ForgotPasswordController;
use App\Http\Controllers\Login\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\API\AttendanceController;



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
Route::get('/homelogin', function () {
    return view('homelogin');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/login', [LoginController::class, 'login']); //route post untuk login
Route::get('/loginback', [LoginController::class, 'index']); 
Route::get('/logout', [LogoutController::class, 'logout']);
Route::post('/registrasi', [RegisterController::class, 'register'])->name('register.coba');
Route::get('/registrasi', [RegisterController::class, 'index'])->name('register.halaman');

//route beranda
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/data_karyawan', [DashboardController::class, 'jumlah']);
Route::get('/tepat_waktu', [AttendanceController::class, 'tepatwaktu']);
Route::get('/terlambat', [DashboardController::class, 'terlambat']);
Route::get('/izin', [DashboardController::class, 'izin']);
Route::get('/rekap_absen', [DashboardController::class, 'rekap']);
// Route::get('/data_karyawan', [PegawaiController::class, 'data']);
Route::get('/settings', [DashboardController::class, 'setting']);
Route::get('/data-pegawai', [DashboardController::class, 'getPegawai']);

//Route Ekspor
Route::post('/presensi/export/pdf', [ExportController::class, 'exportToPdf']);
Route::post('/presensi/export/excel', [ExportController::class, 'exportToExcel']);
Route::get('/exportjk', [ExportController::class, 'exportjk'])->name('exportjk');

// web.php

Route::get('/data-profil', [PegawaiController::class, 'data'])->name('pegawai.index');
// Menampilkan form tambah pegawai
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah'])->name('pegawai.tambah');
// Menyimpan data pegawai baru
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
// Menampilkan detail pegawai
Route::get('/pegawai/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
// Menampilkan form edit pegawai
Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
// Menyimpan perubahan data pegawai
Route::put('/pegawai/{id}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
// Menghapus data pegawai
Route::delete('/pegawai/{id}', [PegawaiController::class, 'hapus'])->name('pegawai.hapus');


Route::post('save-attendance', [AttendanceController::class, 'saveAttendance']);








