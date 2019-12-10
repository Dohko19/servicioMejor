<?php
Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::resource('dashboard', 'DashboardController');
Route::resource('datosadd', 'DatosAdicionalesController');
Route::resource('usuarios', 'UsersController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
