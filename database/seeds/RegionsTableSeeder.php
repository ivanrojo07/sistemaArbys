<?php

use App\Region;
use Carbon\Carbon;
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
    	$regiones = [
    		['nombre' => 'Centro', 'abreviatura' => 'CT', 'created_at' => Carbon::now()],
    		['nombre' => 'Sureste', 'abreviatura' => 'SE', 'created_at' => Carbon::now()],
    		['nombre' => 'Occidente', 'abreviatura' => 'OC','created_at' => Carbon::now()],
    		['nombre' => 'Noreste', 'abreviatura' => 'NE', 'created_at' => Carbon::now()],
    		['nombre' => 'Noroeste', 'abreviatura' => 'NO', 'created_at' => Carbon::now()]
    	];
    	
        Region::insert($regiones);
    }
}
