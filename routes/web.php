<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'Controller@mainPage')->name('home');
Route::get('/kontakt', 'Controller@contact')->name('contact');
Route::get('/samochod/{id}/{nazwa?}', 'CarControll@showCar')->name('samochod');
Route::get('/lista-samohodow', 'CarControll@listCars')->name('lista');
Route::get('/lista-samohodow-wg/{option}/{value}', 'CarControll@listCars')->name('sortBy');
Route::put('/sendMessage/', 'Controller@sendMessage')->name('wyslijWiadomosc');

//ADMINISTATIVE ROUTES
Route::get('/login', 'Controller@loguj')->name('login');
Route::get('/logout', 'HomeController@logmeout')->name('logout');
////////////grouped for admin only
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'CarAdminController@index')->name('adminHome');
    Route::get('/addCar', 'CarAdminController@addCar')->name('addCar');
    Route::put('/savecar/{id?}', 'CarAdminController@saveCar')->name('saveCar');
    Route::get('/deleteCar/{id}', 'CarAdminController@deleteCar')->name('deleteCar');
    Route::get('/deletePhoto/{id}', 'CarAdminController@deletePhoto')->name('deletePhoto');
    Route::get('/statusCar/{id}/{status}', 'CarAdminController@statusCar')->name('statusCar');
    Route::get('/editCar/{id}', 'CarAdminController@editCar')->name('editCar');
    Route::get('/messages/', 'msgControll@list')->name('wiadomosci');
    Route::get('/delMessage/{id}', 'msgControll@delete')->name('UsunWiadomosc');
    Route::get('/readMessage/{id}', 'msgControll@ajaxRead')->name('CzytajWiadomosc');
    Route::get('/settings/', 'SettingControll@index')->name('ustawienia');
    Route::any('/saveSettings/', 'SettingControll@saveChanges')->name('zapiszustawienia');
    Route::get('/myAccount/', 'controller@myAccount')->name('myAccount');
    Route::put('/saveMyAccount/', 'controller@saveMyAccount')->name('saveMyAccount');

});
Auth::routes(['register' => false]);
//Route::get('/', 'HomeController@index')->name('home');
