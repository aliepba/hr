<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::namespace('HR')
        ->middleware(['auth'])
        ->group(function(){
            Route::resource('jabatan', 'JabatanController');
            Route::resource('pegawai', 'PegawaiController');
            Route::resource('upah', 'UpahController');
            Route::resource('absen', 'AbsenController');
            Route::resource('schedule', 'ScheduleController');
            Route::resource('penggajian', 'GajiController');
            Route::resource('pinjaman', 'PinjamanController');
            Route::resource('pembayaran', 'PembayaranController');
            Route::get('/approve/{id}', 'GajiController@setStatus')->name('approve.gaji');
            Route::get('/approve-pinjaman/{id}', 'PinjamanController@setStatus')->name('approve.pinjam');
            Route::get('/detail-pinjaman/{id}', 'PinjamanController@detail')->name('detail.pinjam');
            Route::get('/slip-gaji/{id}', 'GajiController@slipGaji')->name('slip.gaji');
        });

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
