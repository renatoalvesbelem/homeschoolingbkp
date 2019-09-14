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
Route::resource('serie/serie', 'Serie\SerieController');

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/serie', 'Serie\\SerieController@index')->name('serie');
    Route::get('/serie/novo', 'Serie\\SerieController@create')->name('serie/novo');
    Route::get('/serie/editar/{idSerie}', 'Serie\\SerieController@edit')->name('serie/editar');
    Route::put('/serie/atualizar/{idSerie}', 'Serie\\SerieController@update')->name('serie/atualizar');
    Route::get('/serie/deletar/{idSerie}', 'Serie\\SerieController@destroy')->name('serie/deletar');
});
