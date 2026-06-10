<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\JalurController;

// ================= HOME =================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about-us', 'about');
Route::view('/home', 'home');

// ================= ADMIN LOGIN =================
Route::get('/admin/login', function () {
    return view('admin.login');
});
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// ================= ADMIN DASHBOARD =================
Route::get('/admin/dashboard', [InformasiController::class, 'index']);

// ================= INFORMASI =================
Route::post('/informasi/store', [InformasiController::class, 'store']);
Route::put('/informasi/update/{id}', [InformasiController::class, 'update']);
Route::get('/informasi/detail/{id}', [InformasiController::class, 'detail']);
Route::get('/informasi/delete/{id}', [InformasiController::class, 'delete']);

// ================= FAQ =================
Route::get('/faq', [FaqController::class, 'userFaq']);
Route::get('/admin/faq', [FaqController::class, 'index']);
Route::post('/faq/store', [FaqController::class, 'store']);
Route::delete('/faq/delete/{id}', [FaqController::class, 'delete']);
Route::get('/faq/edit/{id}', [FaqController::class, 'edit']);
Route::put('/faq/update/{id}', [FaqController::class, 'update']);

// ================= KUESIONER =================
Route::get('/kuesioner', [KuesionerController::class, 'index']);
Route::post('/kuesioner/store', [KuesionerController::class, 'store']);
Route::get('/admin/kuesioner', [KuesionerController::class, 'admin']);
Route::get('/export-kuesioner', [KuesionerController::class, 'export']);

// ================= PRODI =================
Route::get('/admin/prodi', [ProdiController::class, 'index']);
Route::post('/prodi/store', [ProdiController::class, 'store']);
Route::put('/prodi/update/{id}', [ProdiController::class, 'update']);
Route::delete('/prodi/delete/{id}', [ProdiController::class, 'delete']);
Route::get('/prodi/detail/{id}', [ProdiController::class, 'detail']);

// ================= JALUR =================
Route::get('/jalur-pendaftaran', [JalurController::class, 'user']);
Route::get('/admin/jalur', [JalurController::class, 'index']);
Route::post('/jalur/store', [JalurController::class, 'store']);
Route::put('/jalur/update/{id}', [JalurController::class, 'update']);
Route::delete('/jalur/delete/{id}', [JalurController::class, 'delete']);
Route::get('/jalur/detail/{id}', [JalurController::class, 'detail']);

// ================= HELPDESK USER =================
Route::get('/helpdesk', [HelpdeskController::class, 'index']);
Route::post('/helpdesk/store', [HelpdeskController::class, 'store']);
Route::get('/helpdesk/detail/{id}', [HelpdeskController::class, 'detail']);
Route::post('/helpdesk/reply/{id}', [HelpdeskController::class, 'reply']);
Route::post('/helpdesk/close/{id}', [HelpdeskController::class, 'close']);

// ================= HELPDESK ADMIN =================
Route::get('/admin/helpdesk', [HelpdeskController::class, 'admin']);
Route::get('/admin/helpdesk/detail/{id}', [HelpdeskController::class, 'adminDetail']);
Route::post('/admin/helpdesk/reply/{id}', [HelpdeskController::class, 'balas']);
 // → pakai ini

// ================= ABOUT US =================
Route::get('/about', function () {return view('about');})->name('about');

?>