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
Route::resource('empleados.laborals','Empleado\LaboralController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
Route::get('buscarempleado','Empleado\EmpleadoController@buscar');

Route::get('control_vendedores','Vendedor\VendedorController@control');
Route::get('subgerentes/{oficina}','Vendedor\VendedorController@subgerentes');
Route::get('control_vendedores/grupos','Vendedor\VendedorController@grupos');

Route::resource('vendedors','Vendedor\VendedorController');
Route::get('vendedors/{vendedor}/baja','Vendedor\VendedorController@bajar')->name('vendedors.baja');
Route::get('vendedors/{vendedor}/alta','Vendedor\VendedorController@activar')->name('vendedors.alta');
Route::get('asignarVendedores', 'Vendedor\VendedorController@asignar')->name('vendedor.asignar');
Route::post('unirVendedor', 'Vendedor\VendedorController@unir')->name('vendedores.unir');
Route::get('empleados/laborals/{empleado}/new-laboral', 'Empleado\LaboralController@newLaboral')->name('empleados.laborals.createLaborals');
Route::post('empleados/laborals/{empleado}/add', 'Empleado\LaboralController@addLaborals')->name('empleados.laborals.addLaborals');
Route::resource('empleados.objetivos', 'Empleado\EmpleadoObjetivoController');

// GRUPOS
Route::resource('grupos', 'Grupo\GrupoController');
Route::get('grupos/{grupo}/vendedores', 'Grupo\GrupoController@vendedores')->name('grupos.vendedores');
Route::post('grupos/{grupo}/vendedores', 'Grupo\GrupoController@bind')->name('grupos.bind');
Route::delete('grupos/{grupo}/vendedores', 'Grupo\GrupoController@unbind')->name('grupos.unbind');

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
Route::get('buscarCliente','Cliente\ClienteController@buscar');
Route::resource('clientes.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('clientes.crm','Cliente\ClienteCRMController');
Route::resource('crm','Crm\CrmController');
Route::get('crm.general', 'Cliente\ClienteCRMController@index2')->name('crmgeneral2');
Route::get('fecha','Crm\CrmController@porFecha')->name('fecha');
Route::post('crmstore','Crm\CrmController@store')->name('crmstore');
Route::resource('clientes.producto','Cliente\ClienteProductoController');
Route::resource('clientes.products.transactions', 'Cliente\ClienteProductTransactionController',['only'=>'store']);
Route::post('clientes/{cliente}/producto/{producto}/correo','Cliente\ClienteProductTransactionController@enviarCorreo')->name('enviarCorreo');
Route::resource('clientes.product','Cliente\ClienteProductController', ['only'=>'index']);
Route::resource('clientes.solicitantes', 'Cliente\ClienteSolicitanteController', ['except'=>'index']);
Route::get('clientes/{id}/seleccion', 'Cliente\ClienteController@getSeleccion')->name('seleccion');
Route::get('solicitantes/{id}', 'Cliente\ClienteSolicitanteController@index');
Route::resource('clientes.info','Cliente\ClienteInfoController');
Route::resource('clientes.pagos','Cliente\ClientePagoController');
Route::get('clientes/{cliente}/pagos/{pago}/follow', 'Cliente\ClientePagoController@follow')->name('clientes.pagos.follow');
Route::post('pago_c', 'Cliente\ClientePagoController@store_dos')->name('pago_c');
// Route::get('products/{id_producto}/pdf', 'Cliente\ClienteController@pdf')->name('products.pdf');
Route::resource('clientes.prestamos', 'Cliente\ClientePrestamoController');
Route::get('clientes/{cliente}/prestamos/{prestamo}/pdf','Cliente\ClientePrestamoController@pdf')->name('clientes.prestamos.pdf');
Route::get('asignarClientes', 'Cliente\ClienteController@asignar')->name('clientes.asignar');
Route::post('unirCliente', 'Cliente\ClienteController@unir')->name('clientes.unir');
Route::get('cliente.nuevo', 'Cliente\ClienteNuevoController@vistaNuevoCliente')->name('cliente.nuevo');
Route::post('cliente.nuevo.store', 'Cliente\ClienteNuevoController@guardarClienteNuevo')->name('cliente.nuevo.store');
Route::resource('clientes.integrante','Cliente\ClienteIntegranteController');
Route::get('integrantes/{cliente}','Cliente\ClienteIntegranteController@checkList')->name('integrantes');

// PRODVEEDORES
Route::resource('provedores','Provedor\ProvedorController');
Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController');
Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
Route::resource('provedores.datosbancarios','Provedor\ProveedorDatosBancariosController');

// AJAX
Route::get('getcanales','CanalVenta\CanalVentaController@getCanales');
Route::get('getvendedores','Vendedor\VendedorController@getVendedores');
Route::get('getbancos','Banco\BancoController@getBancos');
Route::get('region2/{region}','Empleado\LaboralController@estados')->name('getregion');
Route::get('estado2/{estado}','Empleado\LaboralController@oficinas')->name('getestado');
Route::get('oficina2/{oficina}','Empleado\LaboralController@grupos')->name('getoficina');

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
Route::resource('oficinas', 'Oficina\OficinaController');
Route::resource('puntoDeVenta', 'PuntoDeVenta\PuntoDeVentaController');

// SEGURIDAD
Route::resource('usuarios', 'Usuario\UsuarioController');
Route::resource('perfils', 'Perfil\PerfilController');

// AUTH
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');