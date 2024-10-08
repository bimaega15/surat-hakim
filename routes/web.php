<?php

use App\Http\Controllers\HasilPermohonanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PermohonanSuratController;
use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::resource('/permohonanSurat', PermohonanSuratController::class)->except(['show']);
Route::get('/permohonanSurat/createDocument', [PermohonanSuratController::class, 'createDocument'])->name('permohonanSurat.createDocument');
Route::resource('/hasilPermohonan', HasilPermohonanController::class)->except(['show']);
Route::get('/hasilPermohonan/cetakPdf', [HasilPermohonanController::class, 'cetakPdf'])->name('hasilPermohonan.cetakPdf');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'index']);
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'store'])->name('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/myProfile', [MyProfileController::class, 'index'])->name('myProfile.index');
    Route::get('/myProfile/{id}/edit', [MyProfileController::class, 'edit'])->name('myProfile.edit');
    Route::put('/myProfile/{id}', [MyProfileController::class, 'update'])->name('myProfile.update');



    // Route::get('select/kasir', [SelectSearchController::class, 'kasir']);
    // Route::get('select/customer', [SelectSearchController::class, 'customer']);
    // Route::get('select/barang', [SelectSearchController::class, 'barang']);
    // Route::get('select/kategoriPembayaran', [SelectSearchController::class, 'kategoriPembayaran']);
    // Route::get('select/supplier', [SelectSearchController::class, 'supplier']);
    // Route::get('select/users', [SelectSearchController::class, 'users']);
});
