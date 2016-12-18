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



/*Admin Page*/
/*Register routers*/
Route::get('/admin','Admin\AdminController@base');
Route::get('/admin/login','Admin\AdminController@getLogin');
Route::post('/admin/login','Admin\RegisterController@login');
Route::get('/admin/register','Admin\AdminController@getRegister');
Route::post('/admin/register','Admin\RegisterController@register');
Route::post('/admin/registerother','Admin\RegisterController@registerother');
Route::get('/confirm/{email}-{token}','Admin\RegisterController@comfirm');
Route::get('/exitadmin','Admin\RegisterController@exitadmin');
Route::get('/admin/users','Admin\AdminController@admins');
Route::post('/admin/deleteadmin','Admin\SettingController@deleteadmin');
/*Event routes*/
Route::get('/admin/events','Admin\AdminController@events');
Route::post('/admin/saveevent','Admin\EventsController@saveevent');

/*Main Page*/
/*Post routes*/
Route::get('/','Main\MainController@main');
Route::get('/post/{i}','Main\MainController@infopost');
/*Meserii routes*/
Route::get('/meserii/{meserii}','Main\MainController@meserii');