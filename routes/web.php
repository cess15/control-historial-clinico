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


Route::group(['middleware' => ['auth','verified']], function () {
	//User auth
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');	
	Route::get('/inicio', 'HomeController@index')->name('inicio');
	Route::get('/perfil', 'ProfileController@index')->name('perfil');
	Route::get('/perfil/editar','ProfileController@edit')->name('perfil.edit');
	Route::post('/perfil/editar/{user}', 'ProfileController@update')->name('perfil.update');
	Route::post('/perfil/editar/credentials/{user}', 'ProfileController@postCredentials')->name('perfil.credentials');
	//Citas
	Route::get('/citas','CitaController@index')->name('citas.index');
});

Route::group(['middleware' => ['auth','verified','administrator']], function () {
	//Administrator-Medicos
	Route::get('/medicos/all','MedicoController@findAll')->name('medicos.data');
	Route::get('/registrar','MedicoController@create')->name('medicos.create');
	Route::post('/registrar','MedicoController@store')->name('medicos.store');
	Route::get('/editar/{medico}','MedicoController@edit')->name('medicos.edit');
	Route::get('/eliminar/{medico}','MedicoController@delete')->name('medicos.delete');
	Route::post('/editar/{medico}','MedicoController@update')->name('medicos.update');
	//Citas
	Route::get('/citas/all','CitaController@findAll')->name('citas.data');
	Route::get('/generar/cupo','CitaController@create')->name('citas.create');
	Route::post('/generar/cupo','CitaController@store')->name('citas.store');
	Route::get('/editar/{citas}/cita','CitaController@edit')->name('citas.edit');
	Route::get('/eliminar/{citas}/cita','CitaController@delete')->name('citas.delete');
	Route::get('/ajax-autocomplete-searchMedic','CitaController@searchMedic')->name('citas.medics');

});



