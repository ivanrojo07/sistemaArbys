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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/personal', 'Personal\PersonalController@search');
Route::get('/clientes', 'Personal\PersonalController@clientes');
Route::get('/prospectos', 'Personal\PersonalController@prospectos');
Route::resource('personals', 'Personal\PersonalController');
Route::resource('personals.datoslaborales', 'Personal\PersonalDatosLabController');
Route::resource('personals.referenciapersonales', 'Personal\PersonalRefPersonalController');
Route::resource('personals.datosbeneficiario', 'Personal\PersonalBeneficiarioController');
Route::resource('personals.productos','Personal\PersonalProductoController');
// Route::resource('datoslaborales','DatosLabController');
// Route::resource('referenciapersonales','RefPersonalController');
// Route::resource('beneficiarios', 'BeneficiariosController');
// Route::resource('prodpersonal','ProdUsuarioController');