<?php

use App\Puesto;
use Illuminate\Database\Seeder;

class PuestosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$puestos = [
    		['nombre' => 'Administrador', 'etiqueta' => 'admin'],
    		['nombre' => 'Director General', 'etiqueta' => 'dg'],
    		['nombre' => 'Director Regional', 'etiqueta' => 'dr'],
    		['nombre' => 'Director Estatal', 'etiqueta' => 'de'],
    		['nombre' => 'Gerente', 'etiqueta' => 'gte'],
    		['nombre' => 'Subgerente', 'etiqueta' => 'sgte'],
    		['nombre' => 'Vendedor', 'etiqueta' => 'ven']
    	];

    	Puesto::create($puestos);
    }
}
