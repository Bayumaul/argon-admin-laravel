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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

//Pegawai

Route::get('/datapegawai', 'App\Http\Controllers\PegawaiController@index')->name('datapegawai');
Route::get('/createpegawai', 'App\Http\Controllers\PegawaiController@create')->name('createpegawai');
Route::post('/simpanpegawai', 'App\Http\Controllers\PegawaiController@store')->name('simpanpegawai');
Route::get('/editpegawai/{id}', 'App\Http\Controllers\PegawaiController@edit')->name('editpegawai');
Route::post('/updatepegawai/{id}', 'App\Http\Controllers\PegawaiController@update')->name('updatepegawai');
Route::get('/deletepegawai/{id}', 'App\Http\Controllers\PegawaiController@destroy')->name('deletepegawai');
Route::get('/cetakpegawai', 'App\Http\Controllers\PegawaiController@cetakPegawai')->name('cetakpegawai');


//auth
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

