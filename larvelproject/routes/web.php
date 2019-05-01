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

Route::get('/hello',function(){
 return 'Hello World!';
});

Route::resource('animals','AnimalController');
Route::get('list', 'AnimalController@list');
Route::get('show/{id}', 'AnimalController@show');

Route::resource('users','UserController');
Route::get('show/{id}', 'UserController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('requests', 'RequestController');
Route::get('/all_requests', 'RequestController@pending_list');
Route::get('approve/{id}', 'RequestController@approve');
Route::get('deny/{id}', 'RequestController@deny');
Route::get('build/{id}', 'RequestController@build');
Route::get('user/{id}', 'RequestController@user_requests');

