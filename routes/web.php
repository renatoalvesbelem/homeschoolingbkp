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
Route::resource('disciplina/disciplina', 'Disciplina\DisciplinaController');
Route::resource('questao/questao', 'Questao\QuestaoController');

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/serie', 'Serie\\SerieController@index')->name('serie');
    Route::get('/serie/novo', 'Serie\\SerieController@create')->name('serie/novo');
    Route::get('/serie/editar/{idSerie}', 'Serie\\SerieController@edit')->name('serie/editar');
    Route::put('/serie/atualizar/{idSerie}', 'Serie\\SerieController@update')->name('serie/atualizar');
    Route::get('/serie/deletar/{idSerie}', 'Serie\\SerieController@destroy')->name('serie/deletar');

    Route::get('/disciplina', 'Disciplina\\DisciplinaController@index')->name('disciplina');
    Route::get('/disciplina/novo', 'Disciplina\\DisciplinaController@create')->name('disciplina/novo');
    Route::get('/disciplina/editar/{idDisciplina}', 'Disciplina\\DisciplinaController@edit')->name('disciplina/editar');
    Route::put('/disciplina/atualizar/{idDisciplina}', 'Disciplina\\DisciplinaController@update')->name('disciplina/atualizar');
    Route::get('/disciplina/deletar/{idDisciplina}', 'Disciplina\\DisciplinaController@destroy')->name('disciplina/deletar');

    Route::get('/questao', 'Questao\\QuestaoController@index')->name('questao');
    Route::get('/questao/novo', 'Questao\\QuestaoController@create')->name('questao/novo');
    Route::get('/questao/editar/{idQuestao}', 'Questao\\QuestaoController@edit')->name('questao/editar');
    Route::put('/questao/atualizar/{idQuestao}', 'Questao\\QuestaoController@update')->name('questao/atualizar');
    Route::get('/questao/deletar/{idQuestao}', 'Questao\\QuestaoController@destroy')->name('questao/deletar');
});
