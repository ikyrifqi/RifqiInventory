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

Route::get('/', function () {
    return view('fakultas.index');
});

// Fakultas
Route::resource('fakultas', 'FakultasController');
Route::get('fakultas', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);
Route::get('fakultas/create', ['as' => 'fakultas.create', 'uses' => 'FakultasController@create']);
Route::post('fakultas', ['as' => 'fakultas.store', 'uses' => 'FakultasController@store']);
Route::get('fakultas/edit/{id}', ['as' => 'fakultas.edit', 'uses' => 'FakultasController@edit']);
Route::put('fakultas/edit/{id}', ['as' => 'fakultas.update', 'uses' => 'FakultasController@update']);
Route::get('fakultas/delete/{id}', ['as' => 'fakultas.delete', 'uses' => 'FakultasController@delete']);


// Jurusan
Route::get('jurusan', ['as' => 'jurusan.index', 'uses' => 'JurusanController@index']);
Route::get('jurusan/create', ['as' => 'jurusan.create', 'uses' => 'JurusanController@create']);
Route::post('jurusan', ['as' => 'jurusan.store', 'uses' => 'JurusanController@store']);
Route::get('jurusan/edit/{id}', ['as' => 'jurusan.edit', 'uses' => 'JurusanController@edit']);
Route::put('jurusan/edit/{id}', ['as' => 'jurusan.update', 'uses' => 'JurusanController@update']);
Route::get('jurusan/delete/{id}', ['as' => 'jurusan.delete', 'uses' => 'JurusanController@delete']);

// Route::get('jurusan/search', 'JurusanController@search');


