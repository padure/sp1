<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Controller@home');

/*Admin Page*/
Route::get('/admin','Admin\AdminController@base');
Route::get('/admin/login','Admin\AdminController@getLogin');
Route::post('/admin/login','Admin\RegisterController@login');
Route::get('/admin/register','Admin\AdminController@getRegister');
Route::post('/admin/register','Admin\RegisterController@register');
Route::get('/confirm/{email}-{token}','Admin\RegisterController@comfirm');
Route::get('/exitadmin','Admin\RegisterController@exitadmin');
