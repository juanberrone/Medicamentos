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

Route::get('profile', 'UserController@profile');

Route::post('profile', 'UserController@update_avatar')->middleware('auth')->name('profile.update');

Route::post('/app/room/store', 'RoomController@store');


//Route::post('guardarMedicamentos', 'ProductController@store');

Route::resource('product', 'ProductController');

Route::resource('ingresoVacuna', 'IngresoVacunasController');

Route::resource('programa', 'ProgramaController');

Route::resource('movement', 'MovementController');

Route::post('/app/movement/store', 'MovementController@store');



Route::get('sala/{id}', 'RoomController@getRoom');



