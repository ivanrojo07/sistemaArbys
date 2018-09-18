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
            // perfil
            // array('nombre' => 'indice perfiles', 'modulo_id' => 1),
            // array('nombre' => 'ver perfil', 'modulo_id' => 1),
            // array('nombre' => 'crear perfil', 'modulo_id' => 1),
            // array('nombre' => 'editar perfil', 'modulo_id' => 1),
            // array('nombre' => 'eliminar perfil', 'modulo_id' => 1),
            // // usuario
            // array('nombre' => 'indice usuarios', 'modulo_id' => 1),
            // array('nombre' => 'ver usuario', 'modulo_id' => 1),
            // array('nombre' => 'crear usuario', 'modulo_id' => 1),
            // array('nombre' => 'editar usuario', 'modulo_id' => 1),
            // array('nombre' => 'eliminar usuario', 'modulo_id' => 1),
            // // empleado
            // array('nombre' => 'indice empleados', 'modulo_id' => 2),
            // array('nombre' => 'ver empleado', 'modulo_id' => 2),
            // array('nombre' => 'crear empleado', 'modulo_id' => 2),
            // array('nombre' => 'editar empleado', 'modulo_id' => 2),
            // // oficinas
            // array('nombre' => 'indice regiones', 'modulo_id' => 8),
            // array('nombre' => 'indice estados', 'modulo_id' => 8),
            // array('nombre' => 'indice oficinas', 'modulo_id' => 8),
            // array('nombre' => 'ver oficina', 'modulo_id' => 8),
            // array('nombre' => 'crear oficina', 'modulo_id' => 8),
            // array('nombre' => 'editar oficina', 'modulo_id' => 8),
            // array('nombre' => 'indice puntos', 'modulo_id' => 8),
            // array('nombre' => 'ver punto', 'modulo_id' => 8),
    	$componentes = array (
            array('nombre' => 'algo', 'modulo_id' => 3),
            array('nombre' => 'algo', 'modulo_id' => 4),
            array('nombre' => 'algo', 'modulo_id' => 5),
            array('nombre' => 'algo', 'modulo_id' => 6),
            array('nombre' => 'algo', 'modulo_id' => 7),
    	);

    	Componente::insert($componentes);
    }
}
