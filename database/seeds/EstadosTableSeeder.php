<?php

use App\Estado;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$estados = [
    		['nombre' => 'Aguascalientes', 'region_id' => 3, 'abreviatura' => 'AGS', 'created_at' => Carbon::now()],
    		['nombre' => 'Baja California', 'region_id' => 5, 'abreviatura' => 'BCN', 'created_at' => Carbon::now()],
    		['nombre' => 'Baja California Sur', 'region_id' => 5, 'abreviatura' => 'BCS', 'created_at' => Carbon::now()],
    		['nombre' => 'Campeche', 'region_id' => 2, 'abreviatura' => 'CAM', 'created_at' => Carbon::now()],
    		['nombre' => 'Chiapas', 'region_id' => 2, 'abreviatura' => 'CHP', 'created_at' => Carbon::now()],
    		['nombre' => 'Chihuahua', 'region_id' => 5, 'abreviatura' => 'CHI', 'created_at' => Carbon::now()],
    		['nombre' => 'Ciudad de México', 'region_id' => 1, 'abreviatura' => 'DIF', 'created_at' => Carbon::now()],
    		['nombre' => 'Coahuila', 'region_id' => 4, 'abreviatura' => 'COA', 'created_at' => Carbon::now()],
    		['nombre' => 'Colima', 'region_id' => 3, 'abreviatura' => 'COL', 'created_at' => Carbon::now()],
    		['nombre' => 'Durango', 'region_id' => 4, 'abreviatura' => 'DUR', 'created_at' => Carbon::now()],
    		['nombre' => 'Guanajuato', 'region_id' => 3, 'abreviatura' => 'GTO', 'created_at' => Carbon::now()],
    		['nombre' => 'Guerrero', 'region_id' => 1, 'abreviatura' => 'GRO', 'created_at' => Carbon::now()],
    		['nombre' => 'Hidalgo', 'region_id' => 1, 'abreviatura' => 'HGO', 'created_at' => Carbon::now()],
    		['nombre' => 'Jalisco', 'region_id' => 3, 'abreviatura' => 'JAL', 'created_at' => Carbon::now()],
    		['nombre' => 'México', 'region_id' => 1, 'abreviatura' => 'MEX', 'created_at' => Carbon::now()],
    		['nombre' => 'Michoacán', 'region_id' => 3, 'abreviatura' => 'MIC', 'created_at' => Carbon::now()],
    		['nombre' => 'Morelos', 'region_id' => 1, 'abreviatura' => 'MOR', 'created_at' => Carbon::now()],
    		['nombre' => 'Nayarit', 'region_id' => 3, 'abreviatura' => 'NAY', 'created_at' => Carbon::now()],
    		['nombre' => 'Nuevo León', 'region_id' => 4, 'abreviatura' => 'NLE', 'created_at' => Carbon::now()],
    		['nombre' => 'Oaxaca', 'region_id' => 2, 'abreviatura' => 'OAX', 'created_at' => Carbon::now()],
    		['nombre' => 'Puebla', 'region_id' => 1, 'abreviatura' => 'PUE', 'created_at' => Carbon::now()],
    		['nombre' => 'Querétaro', 'region_id' => 3, 'abreviatura' => 'QRO', 'created_at' => Carbon::now()],
    		['nombre' => 'Quintana Roo', 'region_id' => 2, 'abreviatura' => 'ROO', 'created_at' => Carbon::now()],
    		['nombre' => 'San Luis Potosí', 'region_id' => 4, 'abreviatura' => 'SLP', 'created_at' => Carbon::now()],
    		['nombre' => 'Sinaloa', 'region_id' => 5, 'abreviatura' => 'SIN', 'created_at' => Carbon::now()],
    		['nombre' => 'Sonora', 'region_id' => 5, 'abreviatura' => 'SON', 'created_at' => Carbon::now()],
    		['nombre' => 'Tabasco', 'region_id' => 2, 'abreviatura' => 'TAB', 'created_at' => Carbon::now()],
    		['nombre' => 'Tamaulipas', 'region_id' => 4, 'abreviatura' => 'TAM', 'created_at' => Carbon::now()],
    		['nombre' => 'Tlaxcala', 'region_id' => 1, 'abreviatura' => 'TLX', 'created_at' => Carbon::now()],
    		['nombre' => 'Veracruz', 'region_id' => 2, 'abreviatura' => 'VER', 'created_at' => Carbon::now()],
    		['nombre' => 'Yucatán', 'region_id' => 2, 'abreviatura' => 'YUC', 'created_at' => Carbon::now()],
    		['nombre' => 'Zacatecas', 'region_id' => 3, 'abreviatura' => 'ZAC', 'created_at' => Carbon::now()]
    	];
        
        Estado::insert($estados);
    }
}
