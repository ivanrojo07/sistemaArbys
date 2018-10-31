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

// LEGACY
Route::get('clientes/legacy/{id}', 'Cliente\ClienteController@legacy');

// MISC
Route::get('getProduct/{id}', 'Producto\ProductController@getProduct');

// PRODUCTOS
Route::resource('productos','Producto\ProductController');
Route::get('producto', 'Producto\ProductController@search');
Route::get('import-export-csv-excel', array('as' => 'excel.import', 'uses' => 'FileController@importExportExcelORCSV'));
Route::post('import-csv-excel', array('as' => 'import-csv-excel', 'uses' => 'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as' => 'excel-file', 'uses' => 'FileController@downloadExcelFile'));

// EMPLEADOS
Route::resource('empleados','Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales','Empleado\EmpleadosDatosLabController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
Route::get('buscarempleado','Empleado\EmpleadoController@buscar');

// GRUPOS
Route::resource('grupos', 'Grupo\GrupoController');

// PRECARGAS
Route::resource('contratos','Precargas\TipoContratoController');
Route::resource('bajas','Precargas\TipoBajaController');
Route::resource('formacontactos','FormaContacto\FormaContactoController');
Route::resource('areas','Area\AreaController', ['except'=>'show']);
Route::resource('puestos','Puesto\PuestoController', ['except'=>'show']);
Route::resource('bancos','Banco\BancoController', ['except'=>'show']);
Route::resource('canalventas','CanalVenta\CanalVentaController', ['except'=>'show']);
Route::resource('gastos','Gasto\GastoController', ['except'=>'show']);
Route::resource('giros','Giro\GiroController', ['except'=>'show']);

// CLIENTES
Route::resource('clientes','Cliente\ClienteController');
Route::resource('clientes.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::get('buscarcliente','Cliente\ClienteController@buscar');
Route::resource('clientes.crm','Cliente\ClienteCRMController');
Route::resource('crm','Crm\CrmController');
Route::get('fecha','Crm\CrmController@porFecha')->name('fecha');
Route::post('crmstore','Crm\CrmController@store')->name('crmstore');
Route::resource('clientes.producto','Cliente\ClienteProductoController');
Route::get('clientes/{id}/searchProducts', 'Cliente\ClienteProductoController@busqueda');
Route::get('clientes/{id}/producto2', 'Cliente\ClienteProductoController@search');
Route::get('clientes/{id}/producto3', 'Cliente\ClienteProductoController@search2');
Route::get('clientes/{id}/producto4', 'Cliente\ClienteProductoController@search3');
Route::resource('clientes.products.transactions', 'Cliente\ClienteProductTransactionController',['only'=>'store']);
Route::resource('clientes.product','Cliente\ClienteProductController', ['only'=>'index']);
Route::resource('clientes.solicitantes', 'Cliente\ClienteSolicitanteController', ['except'=>'index']);
Route::get('clientes/{id}/seleccion', 'Cliente\ClienteController@getSeleccion')->name('seleccion');
Route::get('solicitantes', 'Cliente\ClienteSolicitanteController@index');
Route::resource('clientes.info','Cliente\ClienteInfoController');
Route::resource('clientes.pagos','Cliente\ClientePagoController');
Route::post('pago_c', 'Cliente\ClientePagoController@store_dos')->name('pago_c');
Route::get('products/{id_producto}/pdf', 'Cliente\ClienteController@pdf')->name('products.pdf');

// PRODVEEDORES
Route::resource('provedores','Provedor\ProvedorController');
Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController');
Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
Route::resource('provedores.datosbancarios','Provedor\ProveedorDatosBancariosController');

// AJAX
Route::get('getcanales','CanalVenta\CanalVentaController@getCanales');
Route::get('getbancos','Banco\BancoController@getBancos');
Route::get('region2/{region}','Empleado\EmpleadosDatosLabController@estados')->name('getregion');
Route::get('estado2/{estado}','Empleado\EmpleadosDatosLabController@oficinas')->name('getestado');
Route::get('oficina2/{oficina}','Empleado\EmpleadosDatosLabController@grupos')->name('getoficina');

// SUCURSALES
Route::resource('sucursales','Sucursal\SucursalController');
Route::get('sucursales.create','Sucursal\SucursalController@create');
Route::get('sucursales.index','Sucursal\SucursalController@index');
Route::resource('sucursal','Empleado\EmpleadoSucursalController');

// Route::get('pdf',function() {
// 	$pdf = PDF::loadView('clientes.aux_html');
// 	$clientes= App\Cliente::get();
//     $pdf=PDF::loadView('clientes.vista',['clientes'=>$clientes]);
// 	return $pdf->download('archivo.pdf');
// });

// OFICINAS
Route::get('region', 'Region\RegionController@index')->name('region.index');
Route::get('region/{region}','Region\RegionController@estados');
Route::get('estado', 'Estado\EstadoController@index')->name('estado.index');
Route::get('estado/{estado}','Estado\EstadoController@region');
Route::resource('oficina', 'Oficina\OficinaController');
Route::resource('puntoDeVenta', 'PuntoDeVenta\PuntoDeVentaController');

// SEGURIDAD
Route::resource('usuario', 'Usuario\UsuarioController');
Route::resource('perfil', 'Perfil\PerfilController');

// AUTH
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');