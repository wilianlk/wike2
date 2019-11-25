<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/customers/birthdays', 'CustomerController@birthdays')->name('birthdays');
Route::post('/customers/redeem', 'CustomerController@redeem')->name('redeem');
Route::resource('customers', 'CustomerController');

Route::resource('services', 'ServiceController');

Route::resource('salesLog', 'SalesLogController');

Route::get('/', static function () {
    return view('welcome');
});
