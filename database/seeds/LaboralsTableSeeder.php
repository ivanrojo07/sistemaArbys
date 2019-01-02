<?php

use App\Empleado;
use App\Laboral;
use Illuminate\Database\Seeder;

class LaboralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$empleado = Empleado::get()->first();

    	$datos = [
    		'empleado_id' => $empleado->id,
    		'contrato_id' => 1,
    		'area_id' => 1,
    		'puesto_id' => 1,
	        'contratacion' => date("Y-m-d"),
	        'actualizacion' => date("Y-m-d"),
	        'inicial' => 0,
	        'actual' => 0,
	        'original' => 'Administrador'
    	];

    	Laboral::create($datos);

    }
}
