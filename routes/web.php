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

Route::get('/iniciar', function () {
    return view('auth.login');
});
#HW ENTRADA - Comunicacion
Route::get('entra/{UID}','MiembroController@decide');

#Rutas Super Admin.
Route::resource('admin7alumnoslist','MiembroController');
Route::resource('admin-userslist','UsuarioController');
Route::get('/userslist/pass-edit/{id}','UsuarioController@editpass');
Route::get('/password-edit/{id}','UsuarioController@pass');


#Cargar el excel.
Route::post('alumnos-import', 'MiembroController@alumnosImport')->name('alumnos.import');

#Rutas Servicio-Credencial
Route::get('asignar-credecial/{UID}','MiembroController@tag');
Route::get('confirmar/{UID}/{id}','MiembroController@tag2');
Route::get('guardar/{UID}/{id}','MiembroController@guardatag');

#Rutas Registros
Route::get('list/registros-alumnos/','MiembroController@record');
Route::get('records7alumnoslist/{id}','RecordsController@index');

#Rutas Login
Route::resource('log','LogController');

Route::get('/vista/', function(){
	return view('layouts.principal');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
