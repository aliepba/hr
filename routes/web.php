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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::namespace('HR')
        ->group(function(){
            Route::resource('jabatan', 'JabatanController');
            Route::resource('pegawai', 'PegawaiController');
            Route::resource('upah', 'UpahController');
        });
