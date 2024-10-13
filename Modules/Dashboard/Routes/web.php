<?php

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

Route::prefix('dashboard')->middleware('auth')->group(function() {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/permintaanSurat', 'DashboardController@permintaanSurat')->name('dashboard.permintaanSurat');
    Route::get('/piutangPenjualan', 'DashboardController@piutangPenjualan');
    Route::get('/piutangPembelian', 'DashboardController@piutangPembelian');
});
