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

Auth::routes(['verify' => true]);

Route::get('/', 'LandingController@index')->name('landing');

Route::group(['middleware' => ['guest']], function () {
	//User guest
	Route::get('/login', 'Auth\LoginController@formLogin');
	Route::post('/login', 'Auth\LoginController@login')->name('login');
});


Route::group(['middleware' => ['auth', 'verified']], function () {
	//User auth
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('/inicio', 'HomeController@index')->name('inicio');
	Route::get('/perfil', 'ProfileController@index')->name('perfil');
	Route::get('/perfil/editar', 'ProfileController@edit')->name('perfil.edit');
	Route::post('/perfil/editar/{user}', 'ProfileController@update')->name('perfil.update');
	Route::post('/perfil/editar/credentials/{user}', 'ProfileController@postCredentials')->name('perfil.credentials');
});

Route::group(['middleware' => ['auth', 'verified', 'administrator']], function () {
	//Administrar Medicos
	Route::get('/medicos/all', 'MedicoController@findAll')->name('medicos.data');
	Route::get('/registrar/medico', 'MedicoController@create')->name('medicos.create');
	Route::post('/registrar/medico', 'MedicoController@store')->name('medicos.store');
	Route::get('/editar/{medico}/medico', 'MedicoController@edit')->name('medicos.edit');
	Route::get('/eliminar/{medico}/medico', 'MedicoController@delete')->name('medicos.delete');
	Route::post('/editar/{medico}/medico', 'MedicoController@update')->name('medicos.update');

	//Administrar Empleados
	Route::get('/usuarios', 'UserController@index')->name('users.index');
	Route::get('/registrar/usuario', 'UserController@create')->name('users.create');
	Route::post('/registrar/usuario', 'UserController@store')->name('users.store');
	Route::get('/usuarios/all', 'UserController@findAll')->name('users.data');
	Route::get('/editar/{user}/user', 'UserController@edit')->name('users.edit');
	Route::post('/editar/{user}/user', 'UserController@update')->name('users.update');
	Route::get('/eliminar/{user}/user', 'UserController@delete')->name('users.delete');

	//CitasReservadas
	Route::get('/citas/reservadas', 'CitaReservadaController@index')->name('citasReservadas.index');
	Route::get('/citas/reservadas/all', 'CitaReservadaController@findAll')->name('citasReservadas.data');
	Route::post('/citas/reservadas/reporte/', 'CitaReservadaController@getReport')->name('citasReservadas.report');
});

Route::group(['middleware' => ['auth', 'verified', 'medico']], function () {
	//Médico

	//Rutas para citas
	Route::get('/cita/detalle/{paciente}', 'CitaReservadaController@show')->name('citasReservadas.show');
	Route::get('/cita/atender/{cita}', 'ConsultaController@create')->name('consultas.create');
	Route::post('/cita/atender/{paciente}', 'ConsultaController@store')->name('consultas.store');

	//Rutas para historial clinico
	Route::get('/historial', 'HistorialController@index')->name('historial.index');
	Route::post('/historial/paciente/{paciente}', 'HistorialController@store')->name('historial.store');
	Route::get('/historial/paciente/{paciente}', 'HistorialController@show')->name('historial.show');
});

Route::group(['middleware' => ['auth', 'verified', 'paciente']], function () {
	//Paciente

	//Rutas para reservar citas
	Route::get('/reservar/cita', 'CitaController@getEspecialidades')->name('citas.reservar');
	Route::post('/reservar/cita', 'CitaReservadaController@store')->name('citasReservadas.store');
	Route::get('/cita-reservada-paciente/all', 'CitaReservadaController@getCitaReservadaByPaciente')->name('citasReservadas.paciente');
	Route::get('/reservar/cita/especialidad/{cita}', 'CitaController@getMedicoByEspecialidad')->name('citas.info');
	Route::get('/reservar/cita/especialidad/medico/{medico}', 'CitaController@getCitaByMedico')->name('citas.infoMedico');



	//Rutas para el perfil de paciente
	Route::post('/perfil/paciente/', 'PacienteController@store')->name('pacientes.store');
	Route::post('/perfil/paciente/{paciente}', 'PacienteController@update')->name('pacientes.update');
});

Route::group(['middleware' => ['auth', 'verified', 'secretaria']], function () {
	//Secretaria

	//Rutas para generar cupos
	Route::get('/citas/all', 'CitaController@findAll')->name('citas.data');
	Route::get('/generar/cupo', 'CitaController@create')->name('citas.create');
	Route::post('/generar/cupo', 'CitaController@store')->name('citas.store');
	Route::get('/ajax-autocomplete-searchMedic', 'CitaController@searchMedic')->name('citas.medics');
	Route::post('/editar/{cita}/cita', 'CitaController@update')->name('citas.update');
	Route::get('/editar/{citas}/cita', 'CitaController@edit')->name('citas.edit');
	Route::get('/eliminar/{citas}/cita', 'CitaController@delete')->name('citas.delete');
});

Route::group(['middleware' => ['auth', 'verified', 'cajero']], function () {
	//Cajero
	Route::get('/citas-reservadas-cajero/all', 'CitaReservadaController@findByPagadaIsFalse')->name('citasReservadas.allData');
	Route::get('/citas-reservadas-cajero/edit/{citaReservada}', 'CitaReservadaController@update')->name('citasReservadas.update');
});
