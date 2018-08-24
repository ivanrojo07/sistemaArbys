<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
        	['nombre' => 'Administración', 'etiqueta' => 'ADMIN'],
        	['nombre' => 'Tecnologías de la Información', 'etiqueta' => 'TI'],
        	['nombre' => 'Recursos Humanos', 'etiqueta' => 'RH'],
        	['nombre' => 'Ventas', 'etiqueta' => 'VTAS'],
        	['nombre' => 'Proveedores', 'etiqueta' => 'PROV']
        ];

        Area::insert($areas);
    }
}
