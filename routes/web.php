<?php

use App\Http\Controllers\ConfirmationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify'=>true]);

Route::get('/', 'LandingController@index')->name('landing');

Route::group(['middleware' => ['guest']], function () {
	//User guest
	Route::get('/login', 'Auth\LoginController@formLogin');
	Route::post('/login', 'Auth\LoginController@login')->name('login');
});


Route::group(['middleware' => ['auth']], function () {
	//User auth
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');	
	Route::get('/inicio', 'HomeController@index')->name('inicio');
});

Route::group(['middleware' => ['administrator']], function () {
	Route::get('/send', function () {
		return 'Hola';
	});
});

Route::get('/register/verify/{confirmation_code}', 'ConfirmationController@verify');



