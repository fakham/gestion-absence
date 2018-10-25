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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/filieres', 'FiliereController@index');
Route::get('/filieres/{filiere}', 'FiliereController@edit');
Route::post('/filieres/{filiere}/edit', 'FiliereController@edited')->name('editFiliere');
Route::post('/filieres/{filiere}/delete', 'FiliereController@delete');
