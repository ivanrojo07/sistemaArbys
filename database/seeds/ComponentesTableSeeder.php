<?php

use App\Componente;
use Illuminate\Database\Seeder;

class ComponentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$componentes = array (
            // seguridad
            array('nombre' => 'indice perfiles', 'modulo_id' => 1),
            array('nombre' => 'ver perfil', 'modulo_id' => 1),
            array('nombre' => 'crear perfil', 'modulo_id' => 1),
            array('nombre' => 'editar perfil', 'modulo_id' => 1),
            array('nombre' => 'eliminar perfil', 'modulo_id' => 1),
            array('nombre' => 'indice usuarios', 'modulo_id' => 1),
            array('nombre' => 'ver usuario', 'modulo_id' => 1),
            array('nombre' => 'crear usuario', 'modulo_id' => 1),
            array('nombre' => 'editar usuario', 'modulo_id' => 1),
            array('nombre' => 'eliminar usuario', 'modulo_id' => 1),
            // empleado
            array('nombre' => 'indice empleados', 'modulo_id' => 2),
            array('nombre' => 'ver empleado', 'modulo_id' => 2),
            array('nombre' => 'crear empleado', 'modulo_id' => 2),
            array('nombre' => 'editar empleado', 'modulo_id' => 2),
            array('nombre' => 'indice datos empleado', 'modulo_id' => 2),
            array('nombre' => 'ver datos empleado', 'modulo_id' => 2),
            array('nombre' => 'crear datos empleado', 'modulo_id' => 2),
            array('nombre' => 'editar datos empleado', 'modulo_id' => 2),
            array('nombre' => 'indice grupos', 'modulo_id' => 2),
            array('nombre' => 'ver grupo', 'modulo_id' => 2),
            array('nombre' => 'crear grupo', 'modulo_id' => 2),
            array('nombre' => 'editar grupo', 'modulo_id' => 2),
            // clientes
            array('nombre' => 'indice clientes', 'modulo_id' => 3),
            array('nombre' => 'ver cliente', 'modulo_id' => 3),
            array('nombre' => 'crear cliente', 'modulo_id' => 3),
            array('nombre' => 'editar cliente', 'modulo_id' => 3),
            array('nombre' => 'pagos cliente', 'modulo_id' => 3),
            array('nombre' => 'cotizacion cliente', 'modulo_id' => 3),
            // crm
            array('nombre' => 'indice crm', 'modulo_id' => 4),
            array('nombre' => 'ver crm', 'modulo_id' => 4),
            array('nombre' => 'crear crm', 'modulo_id' => 4),
            array('nombre' => 'editar crm', 'modulo_id' => 4),
            // solicitantes
            array('nombre' => 'indice solicitantes', 'modulo_id' => 5),
            array('nombre' => 'ver solicitante', 'modulo_id' => 5),
            array('nombre' => 'crear solicitante', 'modulo_id' => 5),
            array('nombre' => 'editar solicitante', 'modulo_id' => 5),
            array('nombre' => 'cotizacion solicitante', 'modulo_id' => 5),
            // proveedores
            array('nombre' => 'indice proveedores', 'modulo_id' => 6),
            array('nombre' => 'ver proveedor', 'modulo_id' => 6),
            array('nombre' => 'crear proveedor', 'modulo_id' => 6),
            array('nombre' => 'editar proveedor', 'modulo_id' => 6),
            array('nombre' => 'indice datos proveedor', 'modulo_id' => 6),
            array('nombre' => 'ver datos proveedor', 'modulo_id' => 6),
            array('nombre' => 'crear datos proveedor', 'modulo_id' => 6),
            array('nombre' => 'editar datos proveedor', 'modulo_id' => 6),
            array('nombre' => 'indice filtros', 'modulo_id' => 6),
            array('nombre' => 'ver filtros', 'modulo_id' => 6),
            array('nombre' => 'crear filtros', 'modulo_id' => 6),
            array('nombre' => 'editar filtros', 'modulo_id' => 6),
            array('nombre' => 'indice tipos', 'modulo_id' => 6),
            array('nombre' => 'ver tipos', 'modulo_id' => 6),
            array('nombre' => 'crear tipos', 'modulo_id' => 6),
            array('nombre' => 'editar tipos', 'modulo_id' => 6),
            // productos
            array('nombre' => 'indice productos', 'modulo_id' => 7),
            array('nombre' => 'ver producto', 'modulo_id' => 7),
            array('nombre' => 'alta excel', 'modulo_id' => 7),
            // oficinas
            array('nombre' => 'indice regiones', 'modulo_id' => 8),
            array('nombre' => 'indice estados', 'modulo_id' => 8),
            array('nombre' => 'indice oficinas', 'modulo_id' => 8),
            array('nombre' => 'ver oficina', 'modulo_id' => 8),
            array('nombre' => 'crear oficina', 'modulo_id' => 8),
            array('nombre' => 'editar oficina', 'modulo_id' => 8),
            array('nombre' => 'indice puntos', 'modulo_id' => 8),
            array('nombre' => 'ver punto', 'modulo_id' => 8),
            array('nombre' => 'crear punto', 'modulo_id' => 8),
            array('nombre' => 'editar punto', 'modulo_id' => 8),
            // precargas
            array('nombre' => 'canal de ventas', 'modulo_id' => 9),
            array('nombre' => 'bancos', 'modulo_id' => 9),
            array('nombre' => 'contratos', 'modulo_id' => 9),
            array('nombre' => 'puestos', 'modulo_id' => 9),
            array('nombre' => 'giros', 'modulo_id' => 9),
            array('nombre' => 'forma contacto', 'modulo_id' => 9),
    	);

    	Componente::insert($componentes);
    }
}
