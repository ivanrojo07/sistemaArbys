<?php

use App\Empleado;
use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $empleado = [
        	'nombre' => 'Dummy',
            'appaterno' => 'Dummy',
            'email' => 'admin@arbys.com',
            'rfc' => 'ADMN000000ADM',
            'nacimiento' => date("Y-m-d"),
        ];

        Empleado::create($empleado);

    }
}
