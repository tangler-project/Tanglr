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


Route::get('/api/posts', 'PostsController@index');
Route::get('/api/events', 'EventsController@index');

Route::post('/add/post','PostsController@store');

Route::get('/api/groups', 'GroupsController@index');
Route::get('/api/groups/{id}', 'GroupsController@show');


Route::get('/', 'PostsController@home');
Route::get('/login', 'PostsController@welcome');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

