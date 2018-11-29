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
#HW ENTRADA - Comunicacion
Route::get('entra/{UID}','MiembroController@decide');

#Rutas Super Admin.
Route::resource('admin7alumnoslist','MiembroController');

#Cargar el excel.
Route::post('alumnos-import', 'MiembroController@alumnosImport')->name('alumnos.import');

#Rutas Servicio-Credencial
Route::get('asignar-credecial/{UID}','MiembroController@tag');
Route::get('confirmar/{UID}/{id}','MiembroController@tag2');
Route::get('guardar/{UID}/{id}','MiembroController@guardatag');

#Rutas Registros
Route::get('list/registros-alumnos/','MiembroController@record');
Route::get('records7alumnoslist/{id}','RecordsController@index');

Route::get('/vista/', function(){
	return view('layouts.principal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
