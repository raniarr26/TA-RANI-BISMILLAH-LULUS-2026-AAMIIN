<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/faq', 'faq');
Route::view('/home', 'home');
Route::view('/kuesioner', 'kuesioner');
Route::view('/helpdesk', 'helpdesk');

Route::view('/admin/login', 'admin.login');
Route::get('/admin/dashboard', [InformasiController::class, 'index']); // ✅ INI PENTING
Route::view('/admin/kuesioner', 'admin.kuesioner');
Route::view('/admin/faq', 'admin.faq');
Route::view('/admin/helpdesk', 'admin.helpdesk');


Route::post('/informasi/store', [InformasiController::class, 'store']);
Route::get('/informasi/delete/{id}', [InformasiController::class, 'delete']);