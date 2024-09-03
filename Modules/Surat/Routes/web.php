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

Route::prefix('surat')->group(function () {
    Route::get('/', 'SuratController@index');
    Route::resource('/listSurat', 'ListSuratController');
    Route::resource('/petunjukAwal', 'PetunjukAwalController');
    Route::resource('/petunjukAkhir', 'PetunjukAkhirController');
});
