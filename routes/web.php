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

Route::get('/', 'UserSessionController@index')->name('login');
Route::get('/login', 'UserSessionController@index')->name('login');
Route::post('/login', 'UserSessionController@store')->name('login.store');
Route::get('/logout','UserSessionController@logout')->name('logout');



Route::group(['middleware' => ['auth']], function () {

    Route::get('/todo', function () {
        return view('todo');
    });
    
});
