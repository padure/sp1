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
/*Profil routes*/
    Route::get('/admin/profil','Admin\AdminController@profil');
    Route::post('/admin/changename','Admin\SettingController@changename');
    Route::post('/admin/profil','Admin\SettingController@changepassword');
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
    Route::get('/admin/newevent','Admin\AdminController@newevent');
    Route::post('/admin/saveevent','Admin\EventsController@saveevent');
    Route::post('/admin/defaultupload','Admin\EventsController@defaultupload');
    Route::post('/admin/othersupload','Admin\EventsController@othersupload');
    Route::get('/admin/modifica/{id}','Admin\AdminController@modifica');
    Route::post('/admin/modifica','Admin\EventsController@modificapost');
    Route::post('/admin/deleteevent','Admin\EventsController@deleteevent');
/*SlideShow routes*/
    Route::get('/admin/slideshow','Admin\AdminController@slideshow');
    Route::post('/admin/uploadslideshow','Admin\SlideshowController@uploadslideshow');
    Route::post('/admin/deleteimageslider','Admin\SlideshowController@deleteimageslider');
/*Orar routes*/
    Route::get('/admin/orar','Admin\AdminController@orar');
    Route::post('/admin/uploadorar','Admin\OrarController@uploadorar');
    Route::post('/admin/uploadorarmodificat','Admin\OrarController@uploadorarmodificat');
    Route::post('/admin/uploadactivitati','Admin\OrarController@uploadactivitati');
    Route::post('/admin/deleteorar','Admin\OrarController@deleteorar');
/*Logo si nume routes*/
    Route::get('/admin/logoname','Admin\AdminController@logoname');
    Route::post('/admin/savenamesite','Admin\LogonameController@savenamesite');
    Route::post('/admin/uploadlogo','Admin\LogonameController@uploadlogo');
/*Administratia routes*/
    Route::get('/admin/administratia','Admin\AdminController@administratia');
    Route::post('/admin/uploadadministratia','Admin\AdministratiaController@uploadadministratia');
    Route::post('/admin/addadministratia','Admin\AdministratiaController@addadministratia');
    Route::post('/admin/deladministratia','Admin\AdministratiaController@deladministratia');
    Route::post('/admin/modadministratia','Admin\AdministratiaController@modadministratia');
/*Elevi routes*/
    Route::get('/admin/elevi','Admin\AdminController@elevi');
    Route::post('/admin/addan','Admin\EleviController@addan');
    Route::post('/admin/modan','Admin\EleviController@modan');
    Route::post('/admin/delan','Admin\EleviController@delan');

    Route::post('/admin/addgrupa','Admin\EleviController@addgrupa');
    Route::post('/admin/modgrupa','Admin\EleviController@modgrupa');
    Route::post('/admin/delgrupa','Admin\EleviController@delgrupa');

    Route::post('/admin/addelev','Admin\EleviController@addelev');
    Route::post('/admin/modelev','Admin\EleviController@modelev');
    Route::post('/admin/stergeelev','Admin\EleviController@stergeelev');
    Route::post('/admin/getelevi','Admin\EleviController@getelevi');
    
/*Corp didactic routes*/
    Route::get('/admin/corpdidactic','Admin\AdminController@corpdidactic');
    Route::post('/admin/addcorpdidactic','Admin\CorpdidacticController@addcorpdidactic');
    Route::post('/admin/modcorpdidactic','Admin\CorpdidacticController@modcorpdidactic');
    Route::post('/admin/delcorpdidactic','Admin\CorpdidacticController@delcorpdidactic');
    
/*Regulamente routes*/
    Route::get('/admin/regulamente','Admin\AdminController@regulamente');
    Route::post('/admin/addregulament','Admin\RegulamenteController@addregulament');
    Route::post('/admin/delregulament','Admin\RegulamenteController@delregulament');
    
/*Admitere routes*/
    Route::get('/admin/admiterea','Admin\AdminController@admiterea'); 
    Route::post('/admin/addadmiterea','Admin\AdmitereaController@addadmiterea');
    Route::post('/admin/deladmiterea','Admin\AdmitereaController@deladmiterea');
/*Galerie routes*/
    Route::get('/admin/galerie','Admin\AdminController@galerie');
    Route::post('/admin/addgalerie','Admin\GalerieController@addgalerie');
    Route::post('/admin/uploadgalerie','Admin\GalerieController@uploadgalerie');
    Route::post('/admin/deleteimagegalerie','Admin\GalerieController@deleteimagegalerie');
    Route::post('/admin/modgalerie','Admin\GalerieController@modgalerie');
    Route::post('/admin/delgalerie','Admin\GalerieController@delgalerie');
/*Urna routes*/
    Route::get('/admin/urna','Admin\UrnaController@urna');
    Route::get('/admin/deleteurna','Admin\UrnaController@deleteurna');
/*Parteneriati routes*/
    Route::get('/admin/parteneriati','Admin\AdminController@parteneriati');
    Route::post('/admin/uploadimageparteneriat','Admin\ParteneriatiController@uploadimageparteneriat');
    Route::post('/admin/saveparteneriat','Admin\ParteneriatiController@saveparteneriat');
    Route::post('/admin/modparteneriat','Admin\ParteneriatiController@modparteneriat');
    Route::post('/admin/delparteneriat','Admin\ParteneriatiController@delparteneriat');
/*End Admin Page*/

    
/*Main Page*/
/*Post routes*/
Route::get('/','Main\MainController@main');
Route::get('/post/{i}','Main\MainController@infopost');
/*Meniu routes*/
Route::get('/meserii/operator-suport-tehnic','Main\MainController@operator');
Route::get('/meserii/controleor-produse-alimentare','Main\MainController@controlor');
Route::get('/meserii/bucatar-chelner','Main\MainController@bucatar');
Route::get('/meserii/croitor-confectioner','Main\MainController@croitor');
Route::get('/meserii/cofetar','Main\MainController@cofetar');
Route::get('/despre-noi/misiune-viziune','Main\MainController@misiune');
Route::get('/despre-noi/administratia','Main\MainController@administratia');
Route::get('/despre-noi/plan-dezvoltare-scoala','Main\MainController@plan');
Route::get('/despre-noi/organigrama-institutiei','Main\MainController@organigrama');
Route::get('/despre-noi/corp-didactic','Main\MainController@corpul');
/*Regulamentele*/
Route::get('/regulamente/regulament-intern-activitate-scoala', 'Main\MainController@regulamentintern');
Route::get('/regulamente/regulament-consiliu-elevi', 'Main\MainController@regulamentconsiliu');
Route::get('/regulamente/regulament-activitate-camine', 'Main\MainController@regulamentcamine');
Route::get('/regulamente/rapoarte', 'Main\MainController@rapoarte');
/*Admitere*/
Route::get('/admitere/{admitere}', 'Main\MainController@admitere');
/*Parteneriate*/
Route::get('/parteneriate/{parteneriat}', 'Main\MainController@parteneriat');
/*Absolventi*/
Route::get('/elevi/absolventi', 'Main\MainController@absolvent');
Route::post('/elevi/getelevi','Main\MainController@getelevi');
/*Galerie*/
Route::get('/galerie/activitati-extracurs', 'Main\MainController@activitati');
Route::get('/galerie/decada-meseriilor', 'Main\MainController@decada');
Route::get('/galerie/alte-activitati', 'Main\MainController@altele');
/*Contacte*/
Route::get('/contacte', 'Main\MainController@contacte');
/*Orar*/
Route::get('/orar', 'Main\MainController@orar');
Route::get('/orar-modificat', 'Main\MainController@orarmodificat');
/*Activitati*/
Route::get('/activitati', 'Main\MainController@activitatile');