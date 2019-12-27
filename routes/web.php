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
Route::get('getProductPago/{id}', 'Cliente\ClientePagoController@getProduct');

// PRODUCTOS
Route::resource('productos','Producto\ProductController');
Route::get('producto', 'Producto\ProductController@search');
Route::get('import-export-csv-excel', array('as' => 'excel.import', 'uses' => 'FileController@importExportExcelORCSV'));
Route::post('import-csv-excel', array('as' => 'import-csv-excel', 'uses' => 'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as' => 'excel-file', 'uses' => 'FileController@downloadExcelFile'));

// EMPLEADOS
Route::delete('empleados','Empleado\EmpleadoController@delete');
Route::get('empleados/eliminados','Empleado\EmpleadoController@eliminados');
Route::get('empleados/recuperar/{id}','Empleado\EmpleadoController@recuperar');
Route::resource('empleados','Empleado\EmpleadoController');
Route::resource('empleados.laborals','Empleado\LaboralController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
Route::get('buscarempleado','Empleado\EmpleadoController@buscar');

//Rutas usadas en el apartado de control de vendedores
//Usadas con AJAX
Route::get('control_vendedores','Vendedor\VendedorController@control');
Route::get('subgerentes/{oficina}','Vendedor\VendedorController@subgerentes');
Route::get('control_vendedores/grupos/{oficina}','Vendedor\VendedorController@grupos');
Route::get('control_vendedores/vendedores/{oficina}','Vendedor\VendedorController@Vendedores');
Route::get('control_vendedores/getHistorial','Vendedor\VendedorController@getHistorialVendedor')->name('control.getHistorialVen');
Route::get('control_vendedores/getDirectores','Vendedor\VendedorController@getDirectores')->name('control.getDirectores');
// ---FIN ---

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
Route::get('/precargas/carros/index', 'CarroController@precargaIndex')->name('precargas.carros.index');
Route::get('precargas/carros/crear', 'CarroController@precargaCreate')->name('precargas.carros.create');
Route::post('precargas/carros/store', 'CarroController@precargaStore')->name('precargas.carros.store');
Route::get('precargas/carros/edit/{id}', 'CarroController@precargaEdit')->name('precargas.carros.edit');
Route::put('precargas/carros/{id}/update', 'CarroController@precargaUpdate')->name('precargas.carros.update');
Route::delete('precargas/carros/{id}', 'CarroController@precargaDelete')->name('precargas.carros.delete');

Route::get('/precargas/motos/index', 'MotoController@precargaIndex')->name('precargas.motos.index');
Route::get('/precargas/motos/crear', 'MotoController@precargaCreate')->name('precargas.motos.create');
Route::post('precargas/motos/store', 'MotoController@precargaStore')->name('precargas.motos.store');
Route::get('precargas/motos/edit/{id}', 'MotoController@precargaEdit')->name('precargas.motos.edit');
Route::put('precargas/motos/{id}/update', 'MotoController@precargaUpdate')->name('precargas.motos.update');
Route::delete('precargas/motos/{id}/delete', 'MotoController@precargaDelete')->name('precargas.motos.delete');

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
Route::get('solicitantes/{id}', 'Cliente\ClienteSolicitanteController@index')->name('clienteSolicitante');
Route::resource('clientes.info','Cliente\ClienteInfoController');
Route::resource('clientes.pagos','Cliente\ClientePagoController');
Route::get('clientes/{cliente}/nuevo-pago/{id}','Cliente\ClientePagoController@create_pago')->name('clientes.pago.select');
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
Route::get('provedores-agregar-categoria','Provedor\ProveedorCategoriaController@index')->name('categorias.index');
Route::get('categorias.create','Provedor\ProveedorCategoriaController@create')->name('categorias.create');
Route::post('categoria.store','Provedor\ProveedorCategoriaController@store')->name('categoria.store');
Route::delete('categoria.delete','Provedor\ProveedorCategoriaController@delete')->name('categoria.delete');
Route::get('categoria.edit/{id}','Provedor\ProveedorCategoriaController@edit')->name('categoria.edit');
Route::put('categoria.put','Provedor\ProveedorCategoriaController@put')->name('categoria.put');

Route::get('provedores-agregar-tipo', 'Provedor\ProveedorTipoController@index')->name('tipos.index');
Route::get('tipos.create', 'Provedor\ProveedorTipoController@create')->name('tipos.create');
Route::post('tipos.store', 'Provedor\ProveedorTipoController@store')->name('tipos.store');
Route::delete('tipo.delete', 'Provedor\ProveedorTipoController@delete')->name('tipo.delete');
Route::get('tipo.edit', 'Provedor\ProveedorTipoController@edit')->name('tipo.edit');
Route::put('tipo.put', 'Provedor\ProveedorTipoController@put')->name('tipo.put');

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

// OFICINAS
Route::get('region', 'Region\RegionController@index')->name('region.index');
Route::get('region/{region}','Region\RegionController@estados');
Route::get('estado', 'Estado\EstadoController@index')->name('estado.index');
Route::get('estado/{estado}','Estado\EstadoController@region');
Route::resource('oficinas', 'Oficina\OficinaController');
Route::resource('puntoDeVenta', 'PuntoDeVenta\PuntoDeVentaController');

Route::get('getCurrentFolio/{oficina}', 'Oficina\OficinaController@getCurrentFolio');

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

// PRUEBAS
Route::get('pruebas', 'PruebasController@create');