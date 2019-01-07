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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function() {return view('welcome');});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'SettingsController@index')->name('admin.index');
    Route::post('/edit', 'SettingsController@edit')->name('admin.edit');
    Route::get('/questions', 'QuestionController@index')->name('questions.list');
});

Route::group(['prefix' => 'questions'], function () {
    Route::get('/', 'QuestionController@create')->name('questions.create');
    Route::post('/store', 'QuestionController@store')->name('questions.store');
    Route::get('/delete/{question_id}', 'QuestionController@delete')->name('questions.delete');
    Route::get('/answer/{question_id}', 'QuestionController@answer')->name('questions.answer');
    Route::post('/reply', 'QuestionController@reply')->name('questions.reply');
});


