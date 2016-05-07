<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/', 'TaskController@getIndex');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/task/create', 'TaskController@postCreate');

    Route::get('/task/{id?}', 'TaskController@getEdit');
    Route::post('/task/edit', 'TaskController@postEdit');

    Route::get('/task/confirm-delete/{id?}', 'TaskController@getConfirmDelete');
    Route::get('/task/delete/{id?}', 'TaskController@getDelete');

    Route::get('/logout', 'Auth\AuthController@logout');
});
