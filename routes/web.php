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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PublicController@main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');


Route::group(['middleware' => 'web'], function () {
	Route::get('/apmokejimas', function () { return view('payment'); });
	Route::post('/donate', 'HomeController@donate');
});
Route::post('/paslaugos/store/', 'PayseraGateway@store');
Route::get('/paslaugos/ready/{id}', 'PayseraGateway@ready')->name('Order-ready');
Route::get('/paslaugos/apmoketi/{id}', 'PayseraGateway@redirect')->name('Order-Pay');

Route::get('/paysera/callback', 'PayseraGateway@callback')->name('paysera-callback');
Route::get('/uzsakymas-pavyko', function () { return view('accept'); });
Route::get('/uzsakymas-nepavyko', function () { return view('fail'); });
Route::post('/paypal/complete', 'PayseraGateway@paypal')->name('Paypal-callback');
Route::post('/gift/redeem', 'HomeController@redeem');
Route::get('/sos', 'HomeController@accept');



