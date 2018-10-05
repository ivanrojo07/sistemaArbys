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
    	$estados = array(
    		array('nombre' => 'Aguascalientes', 'region_id' => 5, 'abreviatura' => 'AGS'),
    		array('nombre' => 'Baja California', 'region_id' => 4, 'abreviatura' => 'BCN'),
    		array('nombre' => 'Baja California Sur', 'region_id' => 4, 'abreviatura' => 'BCS'),
    		array('nombre' => 'Campeche', 'region_id' => 3, 'abreviatura' => 'CAM'),
    		array('nombre' => 'Chiapas', 'region_id' => 3, 'abreviatura' => 'CHP'),
    		array('nombre' => 'Chihuahua', 'region_id' => 4, 'abreviatura' => 'CHI'),
    		array('nombre' => 'Ciudad de México', 'region_id' => 2, 'abreviatura' => 'DIF'),
    		array('nombre' => 'Coahuila', 'region_id' => 5, 'abreviatura' => 'COA'),
    		array('nombre' => 'Colima', 'region_id' => 1, 'abreviatura' => 'COL'),
    		array('nombre' => 'Durango', 'region_id' => 5, 'abreviatura' => 'DUR'),
    		array('nombre' => 'Guanajuato', 'region_id' => 1, 'abreviatura' => 'GTO'),
    		array('nombre' => 'Guerrero', 'region_id' => 1, 'abreviatura' => 'GRO'),
    		array('nombre' => 'Hidalgo', 'region_id' => 2, 'abreviatura' => 'HGO'),
    		array('nombre' => 'Jalisco', 'region_id' => 4, 'abreviatura' => 'JAL'),
    		array('nombre' => 'México', 'region_id' => 1, 'abreviatura' => 'MEX'),
    		array('nombre' => 'Michoacán', 'region_id' => 1, 'abreviatura' => 'MIC'),
    		array('nombre' => 'Morelos', 'region_id' => 2, 'abreviatura' => 'MOR'),
    		array('nombre' => 'Nayarit', 'region_id' => 4, 'abreviatura' => 'NAY'),
    		array('nombre' => 'Nuevo León', 'region_id' => 5, 'abreviatura' => 'NLE'),
    		array('nombre' => 'Oaxaca', 'region_id' => 1, 'abreviatura' => 'OAX'),
    		array('nombre' => 'Puebla', 'region_id' => 2, 'abreviatura' => 'PUE'),
    		array('nombre' => 'Querétaro', 'region_id' => 2, 'abreviatura' => 'QRO'),
    		array('nombre' => 'Quintana Roo', 'region_id' => 3, 'abreviatura' => 'ROO'),
    		array('nombre' => 'San Luis Potosí', 'region_id' => 5, 'abreviatura' => 'SLP'),
    		array('nombre' => 'Sinaloa', 'region_id' => 4, 'abreviatura' => 'SIN'),
    		array('nombre' => 'Sonora', 'region_id' => 4, 'abreviatura' => 'SON'),
    		array('nombre' => 'Tabasco', 'region_id' => 3, 'abreviatura' => 'TAB'),
    		array('nombre' => 'Tamaulipas', 'region_id' => 5, 'abreviatura' => 'TAM'),
    		array('nombre' => 'Tlaxcala', 'region_id' => 2, 'abreviatura' => 'TLX'),
    		array('nombre' => 'Veracruz', 'region_id' => 3, 'abreviatura' => 'VER'),
    		array('nombre' => 'Yucatán', 'region_id' => 3, 'abreviatura' => 'YUC'),
    		array('nombre' => 'Zacatecas', 'region_id' => 5, 'abreviatura' => 'ZAC')
    	);
        
        Estado::insert($estados);
    }
}
