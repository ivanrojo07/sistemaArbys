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
    	$modulos = [
    		['nombre' => 'seguridad'],
    		['nombre' => 'rh'],
    		['nombre' => 'clientes'],
    		['nombre' => 'crm'],
    		['nombre' => 'solicitantes'],
    		['nombre' => 'productos'],
    		['nombre' => 'proveedores'],
    		['nombre' => 'oficinas']
    	];

    	Modulo::create($modulos);
    }
}
