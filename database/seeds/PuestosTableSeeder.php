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
    	$puestos = array(
    		array('nombre' => 'Administrador', 'etiqueta' => 'admin'),
    		array('nombre' => 'Director General', 'etiqueta' => 'dg'),
    		array('nombre' => 'Director Regional', 'etiqueta' => 'dr'),
    		array('nombre' => 'Director Estatal', 'etiqueta' => 'de'),
    		array('nombre' => 'Gerente', 'etiqueta' => 'gte'),
    		array('nombre' => 'Subgerente', 'etiqueta' => 'sgte'),
    		array('nombre' => 'Vendedor', 'etiqueta' => 'ven')
    	);

    	Puesto::insert($puestos);
    }
}
