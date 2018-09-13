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
    	$componentes = array(
    		array('nombre' => 'cmp1', 'modulo_id' => 1),
    		array('nombre' => 'cmp2', 'modulo_id' => 2),
    		array('nombre' => 'cmp3', 'modulo_id' => 3),
    		array('nombre' => 'cmp4', 'modulo_id' => 4),
    		array('nombre' => 'cmp5', 'modulo_id' => 5),
    		array('nombre' => 'cmp6', 'modulo_id' => 6),
    		array('nombre' => 'cmp7', 'modulo_id' => 7),
    		array('nombre' => 'cmp8', 'modulo_id' => 8),
    	);

    	Componente::insert($componentes);
    }
}
