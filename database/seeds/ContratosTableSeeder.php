<?php

use App\TipoContrato;
use Illuminate\Database\Seeder;

class ContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$contrato = [
    		'nombre' => 'Formal',
    	];

    	TipoContrato::create($contrato);

    }
}
