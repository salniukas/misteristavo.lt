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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/apmokejimas', function () { return view('payment'); });
Route::post('/paysera/redirect', 'PayseraGateway@redirect')->name('paysera-redirect');
Route::get('/paysera/callback', 'PayseraGateway@callback')->name('paysera-callback');
Route::get('/paysera/uzsakymas-pavyko', function () { return view('paysera.success'); });
Route::get('/paysera/uzsakymas-nepavyko', function () { return view('paysera.success'); });
