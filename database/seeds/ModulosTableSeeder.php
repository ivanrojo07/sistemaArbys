<?php

use App\Modulo;
use Illuminate\Database\Seeder;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$modulos = array(                         // id
    		array('nombre' => 'seguridad'),       // 1
    		array('nombre' => 'rh'),              // 2
    		array('nombre' => 'clientes'),        // 3
    		array('nombre' => 'crm'),             // 4
    		array('nombre' => 'solicitantes'),    // 5
    		array('nombre' => 'proveedores'),     // 6
            array('nombre' => 'productos'),       // 7
            array('nombre' => 'oficinas'),        // 8
            array('nombre' => 'precargas'),       // 9
    	);

    	Modulo::insert($modulos);
    }
}
