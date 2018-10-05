<?php

use App\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$regiones = array(
    		array('nombre' => 'Región 1', 'abreviatura' => 'R1'),
    		array('nombre' => 'Región 2', 'abreviatura' => 'R2'),
    		array('nombre' => 'Región 3', 'abreviatura' => 'R3'),
    		array('nombre' => 'Región 4', 'abreviatura' => 'R4'),
    		array('nombre' => 'Región 5', 'abreviatura' => 'R5')
    	);
    	
        Region::insert($regiones);
    }
}
