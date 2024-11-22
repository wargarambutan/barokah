<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\PsbBarokahController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Teknisi\TeknisiController;

use Illuminate\Support\Facades\Route;




Route::get('/', [PendaftaranController::class, 'index'])->name('index');
Route::get('pendaftaran-karyawan', [PendaftaranController::class, 'pendaftaran'])->name('pendaftaran-karyawan');
Route::post('pendaftaran-karyawan', [PendaftaranController::class, 'store'])->name('pendaftaran-karyawan.store');
Route::get('cek-pendaftaran', [PendaftaranController::class, 'cekPendaftaran'])->name('cek-pendaftaran');
Route::get('pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
Route::delete('pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
Route::get('/view-pdf/{filename}', function ($filename) {
    $path = storage_path('app/public/uploads/cv/' . $filename);
    return response()->file($path);
})->name('view.pdf');

Route::get('pendaftaran-pelanggan', [PelangganController::class, 'create'])->name('pendaftaran-pelanggan');
Route::post('pendaftaran-pelanggan', [PelangganController::class, 'store'])->name('pendaftaran-pelanggan.store');
Route::get('cek-keluhan', [PelangganController::class, 'cekKeluhan'])->name('cek-keluhan');
Route::get('ajukan-keluhan', [PelangganController::class, 'keluhan'])->name('ajukan-keluhan');
Route::post('ajukan-keluhan', [PelangganController::class, 'ajukanKeluhan'])->name('ajukan-keluhan.post');




// Route Admin Barokah
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Route Pendaftaran Karyawan
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('verifikasi-karyawan', [AdminController::class, 'verifikasi'])->name('verifikasi');
    Route::get('karyawan/{id}/detail', [AdminController::class, 'detail'])->name('karyawan.detail');
    Route::get('karyawan-diterima', [AdminController::class, 'diterima'])->name('diterima');
    Route::get('karyawan/{id}/detail-diterima', [AdminController::class, 'detail_diterima'])->name('karyawan.diterima');
    Route::get('karyawan-ditolak', [AdminController::class, 'ditolak'])->name('ditolak');
    Route::get('karyawan/{id}/detail-ditolak', [AdminController::class, 'detail_ditolak'])->name('karyawan.ditolak');
    Route::get('laporan-karyawan', [AdminController::class, 'laporan'])->name('laporan');
    Route::post('karyawan/{id}/update-status', [AdminController::class, 'updateStatus'])->name('karyawan.updateStatus');
    Route::delete('karyawan/{id}', [AdminController::class, 'hapus'])->name('karyawan.hapus');
    // Route untuk halaman form kirim email
    Route::get('/karyawan/{id}/kirim-email-diterima', [AdminController::class, 'kirimEmailDiterimaForm'])->name('karyawan.kirimEmailDiterimaForm');
    // Route untuk mengirim email
    Route::post('/karyawan/{id}/kirim-email-diterima', [AdminController::class, 'kirimEmailDiterima'])->name('karyawan.kirimEmailDiterima');
    Route::get('/admin/karyawan/{karyawan}/kirim-email-ditolak', [AdminController::class, 'kirimEmailDitolakForm'])->name('admin.kirimEmailDitolakForm');
    Route::post('/admin/karyawan/{karyawan}/kirim-email-ditolak', [AdminController::class, 'kirimEmailDitolak'])->name('admin.kirimEmailDitolak');
    Route::get('/laporan/cetak', [AdminController::class, 'cetakLaporan'])->name('cetak-laporan');
    Route::get('/admin/preview-laporan', [AdminController::class, 'previewLaporan'])->name('preview-laporan');
    Route::post('/admin/ubah-status-pendaftaran', [AdminController::class, 'ubahStatusPendaftaran'])->name('ubah-status-pendaftaran');
    // Route Pelanggan Barokah
    Route::resource('psb-barokah', PsbBarokahController::class);
    Route::get('psb-barokah/{id}/cetak-id-card', [PsbBarokahController::class, 'cetakIdCard'])->name('psb-barokah.cetakIdCard');
    // Route Karyawan Barokah
    Route::resource('karyawan-barokah', KaryawanController::class);
    Route::resource('user-barokah', UserController::class);
});



// Route Teknisi
Route::group(['middleware' => ['auth', 'role:teknisi']], function () {
    Route::get('teknisi-dashboard', [TeknisiController::class, 'index'])->name('teknisi');
    Route::get('daftar-keluhan', [TeknisiController::class, 'keluhan'])->name('keluhan');
});




Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Rute untuk menampilkan form login
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk mengirimkan form login
Route::post('login', [LoginController::class, 'login']);

// Rute untuk logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')->get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/kartu-identitas', function () {
    return view('kartu');
});
