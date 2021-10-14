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
            Route::get('/pegawai', 'PegawaiController@index')->name('pegawai.index');
            Route::get('/tambah-pegawai', 'PegawaiController@create')->name('pegawai.add');
            Route::post('/tambah-pegawai/add', 'PegawaiController@store')->name('pegawai.store');

            Route::get('/jabatan', 'JabatanController@index')->name('jabatan.index');
            Route::post('/jabatan/post', 'JabatanController@store')->name('jabatan.store');
            Route::get('/jabatan/{id}', 'JabatanController@edit')->name('jabatan.edit');
            Route::put('/jabatan/update/{id}', 'JabatanController@update')->name('jabatan.update');
            Route::delete('/jabatan/delete{id}', 'JabatanController@destroy')->name('jabatan.delete');

            Route::get('/upah', 'UpahController@index')->name('upah.index');
            Route::post('/upah/post', 'UpahController@store')->name('upah.store');
            Route::get('/upah/{id}', 'UpahController@edit')->name('upah.edit');
            Route::put('/upah/update/{id}', 'UpahController@update')->name('upah.update');
            Route::delete('/upah/delete/{id}', 'UpahController@destroy')->name('upah.delete');
        });
