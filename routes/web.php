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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::group(['middleware' => ['web']], function () {
    Route::auth();
});


Route::get('/home', 'NoteController@index');
Route::get('/', 'NoteController@index');
Route::get('/notes', 'NoteController@index');
Route::get('/notes/removed', 'NoteController@showRemoved');
Route::get('/share/{note}', 'ShareController@index');

Route::post('/note', 'NoteController@store');
Route::post('/note/{note}', 'NoteController@remove');
Route::post('/note/restore/{note}', 'NoteController@restore');
Route::post('/share', 'ShareController@shareNote')->name('shareNote');
