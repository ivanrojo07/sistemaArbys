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
	return redirect()->route('login');
});

Route::get('personal', 'Personal\PersonalController@search');
// Route::get('prospectos', 'Personal\PersonalController@prospectos');
Route::resource('personals', 'Personal\PersonalController');
Route::resource('personals.datoslaborales', 'Personal\PersonalDatosLabController');
Route::resource('personals.referenciapersonales', 'Personal\PersonalRefPersonalController');
Route::resource('personals.datosbeneficiario', 'Personal\PersonalBeneficiarioController');
Route::resource('personals.producto','Personal\PersonalProductoController');
Route::resource('personals.crm','Personal\PersonalCRMController');
Route::resource('productos','Producto\ProductController');

Route::get('import-export-csv-excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'));
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));

Route::resource('personals.products.transactions', 'Personal\PersonalProductTransactionController',['only'=>'store']);
Route::resource('personals.product','Personal\PersonalProductController', ['only'=>'index']);
// Route::resource('datoslaborales','DatosLabController');
// Route::resource('referenciapersonales','RefPersonalController');
// Route::resource('beneficiarios', 'BeneficiariosController');
// Route::resource('prodpersonal','ProdUsuarioController');
Route::get('pruebas','PruebasController@create');

Route::resource('empleados','Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales','Empleado\EmpleadosDatosLabController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
Route::resource('contratos','Precargas\TipoContratoController');
Route::resource('bajas','Precargas\TipoBajaController');

Route::get('buscarempleado','Empleado\EmpleadoController@buscar');
    
//Añadido <Iyari> 5/dic/2017//


Route::get('bonos',function(){

	return View::make('Empleadobonos.bonos');
});
Route::get('comision',function(){

	return View::make('Empleadobonos.comision');
});
//   11/Dic/2017
//-----------------------------------------------------


Route::resource('formacontactos','FormaContacto\FormaContactoController');


Route::resource('clientes','Cliente\ClienteController');
Route::resource('clientes.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('clientes.contacto','Personal\PersonalContactoController');
Route::resource('clientes.datosgenerales','Personal\PersonalDatosGeneralesController', ['except'=>'show']);
Route::get('buscarcliente','Cliente\ClienteController@buscar');
Route::resource('clientes.crm','Cliente\ClienteCRMController');
Route::resource('crm','Crm\CrmController');
Route::get('fecha','Crm\CrmController@porFecha')->name('fecha');
Route::post('crmstore','Crm\CrmController@store')->name('crmstore');




Route::resource('clientes.producto','Cliente\ClienteProductoController');
Route::resource('clientes.products.transactions', 'Cliente\ClienteProductTransactionController',['only'=>'store']);
Route::resource('clientes.product','Cliente\ClienteProductController', ['only'=>'index']);
Route::resource('clientes.solicitantes', 'Cliente\ClienteSolicitanteController', ['except'=>'index']);
Route::get('solicitantes', 'Cliente\ClienteSolicitanteController@index');

Route::resource('clientes.info','Cliente\ClienteInfoController');

Route::resource('clientes.pago','Cliente\ClientePagoController');
Route::post('pago_c', 'Cliente\ClientePagoController@store_dos')->name('pago_c');
//----------------------------------------------------------


//Route::get('buscarsolicitante','Solicitante\SolicitanteController@buscar');

//-----------------------------------------------------
Route::resource('provedores','Provedor\ProvedorController');
Route::get('buscarprovedor','Provedor\ProvedorController@buscar');
Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController', ['except'=>'show']);
Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
//----------------------------------------------------------
Route::resource('giros','Giro\GiroController', ['except'=>'show']);
//---------------------------------------------------------------------

Route::get('producto', 'Producto\ProductController@search');
//---------------------------------------------------------------------------
Route::resource('areas','Area\AreaController', ['except'=>'show']);
Route::resource('puestos','Puesto\PuestoController', ['except'=>'show']);
Route::resource('bancos','Banco\BancoController', ['except'=>'show']);
Route::resource('canalventas','CanalVenta\CanalVentaController', ['except'=>'show']);
//--------------------------------------------------------------------
Route::get('getcanales','CanalVenta\CanalVentaController@getCanales');
Route::get('getbancos','Banco\BancoController@getBancos');
//--------------------------------------------------------------
Route::resource('gastos','Gasto\GastoController', ['except'=>'show']);
// Route::resource('gastos.create','Gasto\GastoController@create');

Route::resource('sucursales','Sucursal\SucursalController');
Route::get('sucursales.create','Sucursal\SucursalController@create');
Route::get('sucursales.index','Sucursal\SucursalController@index');

Route::resource('sucursal','Empleado\EmpleadoSucursalController');

Route::get('products/{id_producto}/pdf', 'Cliente\ClienteController@pdf')->name('products.pdf');

Route::get('temporal', function () {
    return view('temporal.tempo', ['name' => 'James']);
});

Route::get('pdf',function() {
	//$pdf = PDF::loadView('clientes.aux_html');
	$clientes= App\Cliente::get();
    $pdf=PDF::loadView('clientes.vista',['clientes'=>$clientes]);
	return $pdf->download('archivo.pdf');
});

//Route::get('doc','Cliente\ClienteProductoController');
//-------------------------------------------------------------------
//->name('products.pdf')

/*
 * OFICINAS
 */

Route::get('region', 'Region\RegionController@index')->name('region.index');
Route::get('region/{region}','Region\RegionController@estados');
Route::get('estado', 'Estado\EstadoController@index')->name('estado.index');
Route::get('estado/{estado}','Estado\EstadoController@region');
Route::resource('oficina', 'Oficina\OficinaController');
Route::resource('puntoDeVenta', 'PuntoDeVenta\PuntoDeVentaController');

/*
 * MENU RECURSOS HUMANOS += EMPLEADO COMERCIAL
 */

Route::resource('empleadoc', 'EmpleadoComercial\EmpleadoComercialController');
Route::resource('empleadoc.datoslaborales', 'EmpleadoComercial\EmpleadoComDatosLabController');

/*
 * SEGURIDAD -> Armando 16/08/2018
 */

Route::resource('usuario', 'Usuario\UsuarioController');
Route::resource('perfil', 'Perfil\PerfilController');

/*
 * AUTENTICACION
 */

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/denegado',function(){
	return view('errors.denegado');
})->name('denegado');

Route::get('/home', function () {
	if(Auth::check()){
    	return view('welcome');
	}else{
		return redirect()->route('login');
	}
})->name('home');

