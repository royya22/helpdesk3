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
    return view('index');
});

Route::get('laporan','LaporanController@index');
Route::get('create-laporan','LaporanController@create');
Route::post('store-laporan','LaporanController@store');

Route::get('login','DashboardController@login');
Route::get('dashboard','DashboardController@index');

Route::get('open','TiketController@open');
Route::get('pending','TiketController@pending');
Route::get('form-pending/{id}','TiketController@form_pending');
Route::post('store-pending/{id}','TiketController@store_pending');
Route::get('close','TiketController@close');
Route::get('form-close/{id}','TiketController@form_close');
Route::post('store-close/{id}','TiketController@store_close');
Route::get('close-detail/{id}','TiketController@close_detail');

Route::get('insiden','InsidenController@index');
Route::get('create-insiden','InsidenController@create');
// Route::get('Insiden-detail','InsidenController@show');

Route::get('unit','UnitController@index');
Route::get('create-unit','UnitController@create');
Route::post('store-unit','UnitController@store');
Route::get('detail-unit/{id}','UnitController@show');
Route::get('edit-unit/{id}','UnitController@edit');
Route::post('update-unit/{id}','UnitController@update');
Route::get('delete-unit/{id}','UnitController@destroy');

Route::get('subjek','SubjekController@index');
Route::get('create-subjek','SubjekController@create');
Route::post('store-subjek','SubjekController@store');
Route::get('detail-subjek/{id}','SubjekController@show');
Route::get('edit-subjek/{id}','SubjekController@edit');
Route::post('update-subjek/{id}','SubjekController@update');
Route::get('delete-subjek/{id}','SubjekController@destroy');

Route::get('teknisi','TeknisiController@index');
Route::get('password','TeknisiController@ubah_password');