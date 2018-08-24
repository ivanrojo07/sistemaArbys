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
    	$modulos = array(
    		array('nombre' => 'seguridad'),
    		array('nombre' => 'rh'),
    		array('nombre' => 'clientes'),
    		array('nombre' => 'crm'),
    		array('nombre' => 'solicitantes'),
    		array('nombre' => 'productos'),
    		array('nombre' => 'proveedores'),
    		array('nombre' => 'oficinas')
    	);

    	Modulo::insert($modulos);
    }
}
