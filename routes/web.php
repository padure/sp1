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
Route::post('/admin/defaultupload','Admin\EventsController@defaultupload');
/*Main Page*/
/*Post routes*/
Route::get('/','Main\MainController@main');
Route::get('/post/{i}','Main\MainController@infopost');
/*Meniu routes*/
Route::get('/meserii/{meserii}','Main\MainController@meserii');
Route::get('/despre-noi/misiune-viziune','Main\MainController@misiune');
Route::get('/despre-noi/administratia','Main\MainController@administratia');
Route::get('/despre-noi/plan-dezvoltare-scoala','Main\MainController@plan');
Route::get('/despre-noi/organigrama-institutiei','Main\MainController@organigrama');
Route::get('/despre-noi/corp-didactic','Main\MainController@corpul');
/*Regulamentele*/
Route::get('/regulamente/{regulament}', 'Main\MainController@regulament');
/*Admitere*/
Route::get('/admitere/{admitere}', 'Main\MainController@admitere');
/*Parteneriate*/
Route::get('/parteneriate/{parteneriat}', 'Main\MainController@parteneriat');
/*Absolventi*/
Route::get('/elevi/absolventi', 'Main\MainController@absolvent');
/*Galerie*/
Route::get('/galerie/activitati-extracurs', 'Main\MainController@activitati');
Route::get('/galerie/decada-meseriilor', 'Main\MainController@decada');
Route::get('/galerie/alte-activitati', 'Main\MainController@altele');
/*Contacte*/
Route::get('/contacte', 'Main\MainController@contacte');
