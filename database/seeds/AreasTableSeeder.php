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
        $areas = array(
        	array('nombre' => 'Administración', 'etiqueta' => 'ADMIN'),
        	array('nombre' => 'Tecnologías de la Información', 'etiqueta' => 'TI'),
        	array('nombre' => 'Recursos Humanos', 'etiqueta' => 'RH'),
        	array('nombre' => 'Ventas', 'etiqueta' => 'VTAS'),
        	array('nombre' => 'Proveedores', 'etiqueta' => 'PROV')
        );

        Area::insert($areas);
    }
}
