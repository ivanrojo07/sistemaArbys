<?php

use App\Region;
use App\Estado;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$regiones = array(
    		array('nombre' => 'Centro', 'abreviatura' => 'CT', 'created_at' => Carbon::now()),
    		array('nombre' => 'Sureste', 'abreviatura' => 'SE', 'created_at' => Carbon::now()),
    		array('nombre' => 'Occidente', 'abreviatura' => 'OC','created_at' => Carbon::now()),
    		array('nombre' => 'Noreste', 'abreviatura' => 'NE', 'created_at' => Carbon::now()),
    		array('nombre' => 'Noroeste', 'abreviatura' => 'NO', 'created_at' => Carbon::now())
    	);

    	$estados = array(
    		array('nombre' => 'Aguascalientes', 'region_id' => 3, 'abreviatura' => 'AGS', 'created_at' => Carbon::now()),
    		array('nombre' => 'Baja California', 'region_id' => 5, 'abreviatura' => 'BCN', 'created_at' => Carbon::now()),
    		array('nombre' => 'Baja California Sur', 'region_id' => 5, 'abreviatura' => 'BCS', 'created_at' => Carbon::now()),
    		array('nombre' => 'Campeche', 'region_id' => 2, 'abreviatura' => 'CAM', 'created_at' => Carbon::now()),
    		array('nombre' => 'Chiapas', 'region_id' => 2, 'abreviatura' => 'CHP', 'created_at' => Carbon::now()),
    		array('nombre' => 'Chihuahua', 'region_id' => 5, 'abreviatura' => 'CHI', 'created_at' => Carbon::now()),
    		array('nombre' => 'Ciudad de México', 'region_id' => 1, 'abreviatura' => 'DIF', 'created_at' => Carbon::now()),
    		array('nombre' => 'Coahuila', 'region_id' => 4, 'abreviatura' => 'COA', 'created_at' => Carbon::now()),
    		array('nombre' => 'Colima', 'region_id' => 3, 'abreviatura' => 'COL', 'created_at' => Carbon::now()),
    		array('nombre' => 'Durango', 'region_id' => 4, 'abreviatura' => 'DUR', 'created_at' => Carbon::now()),
    		array('nombre' => 'Guanajuato', 'region_id' => 3, 'abreviatura' => 'GTO', 'created_at' => Carbon::now()),
    		array('nombre' => 'Guerrero', 'region_id' => 1, 'abreviatura' => 'GRO', 'created_at' => Carbon::now()),
    		array('nombre' => 'Hidalgo', 'region_id' => 1, 'abreviatura' => 'HGO', 'created_at' => Carbon::now()),
    		array('nombre' => 'Jalisco', 'region_id' => 3, 'abreviatura' => 'JAL', 'created_at' => Carbon::now()),
    		array('nombre' => 'México', 'region_id' => 1, 'abreviatura' => 'MEX', 'created_at' => Carbon::now()),
    		array('nombre' => 'Michoacán', 'region_id' => 3, 'abreviatura' => 'MIC', 'created_at' => Carbon::now()),
    		array('nombre' => 'Morelos', 'region_id' => 1, 'abreviatura' => 'MOR', 'created_at' => Carbon::now()),
    		array('nombre' => 'Nayarit', 'region_id' => 3, 'abreviatura' => 'NAY', 'created_at' => Carbon::now()),
    		array('nombre' => 'Nuevo León', 'region_id' => 4, 'abreviatura' => 'NLE', 'created_at' => Carbon::now()),
    		array('nombre' => 'Oaxaca', 'region_id' => 2, 'abreviatura' => 'OAX', 'created_at' => Carbon::now()),
    		array('nombre' => 'Puebla', 'region_id' => 1, 'abreviatura' => 'PUE', 'created_at' => Carbon::now()),
    		array('nombre' => 'Querétaro', 'region_id' => 3, 'abreviatura' => 'QRO', 'created_at' => Carbon::now()),
    		array('nombre' => 'Quintana Roo', 'region_id' => 2, 'abreviatura' => 'ROO', 'created_at' => Carbon::now()),
    		array('nombre' => 'San Luis Potosí', 'region_id' => 4, 'abreviatura' => 'SLP', 'created_at' => Carbon::now()),
    		array('nombre' => 'Sinaloa', 'region_id' => 5, 'abreviatura' => 'SIN', 'created_at' => Carbon::now()),
    		array('nombre' => 'Sonora', 'region_id' => 5, 'abreviatura' => 'SON', 'created_at' => Carbon::now()),
    		array('nombre' => 'Tabasco', 'region_id' => 2, 'abreviatura' => 'TAB', 'created_at' => Carbon::now()),
    		array('nombre' => 'Tamaulipas', 'region_id' => 4, 'abreviatura' => 'TAM', 'created_at' => Carbon::now()),
    		array('nombre' => 'Tlaxcala', 'region_id' => 1, 'abreviatura' => 'TLX', 'created_at' => Carbon::now()),
    		array('nombre' => 'Veracruz', 'region_id' => 2, 'abreviatura' => 'VER', 'created_at' => Carbon::now()),
    		array('nombre' => 'Yucatán', 'region_id' => 2, 'abreviatura' => 'YUC', 'created_at' => Carbon::now()),
    		array('nombre' => 'Zacatecas', 'region_id' => 3, 'abreviatura' => 'ZAC', 'created_at' => Carbon::now())
    	);
        // $this->call(UsersTableSeeder::class);
        Region::insert($regiones);
        Estado::insert($estados);
    }
}
