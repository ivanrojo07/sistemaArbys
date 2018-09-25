<?php

use App\Empleado;
use App\EmpleadosDatosLab;
use Illuminate\Database\Seeder;

class DatosLaboralesTableSeeder extends Seeder
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
	        'fechacontratacion' => date("Y-m-d"),
	        'fechaactualizacion' => date("Y-m-d"),
	        'sal_inicial' => 0,
	        'sal_actual' => 0,
	        'puesto_orig' => 'Administrador'
    	];

    	EmpleadosDatosLab::create($datos);

    }
}
