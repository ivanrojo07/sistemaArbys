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
            array('nombre' => 'Comercial', 'etiqueta' => 'COMER'),
        );

        Area::insert($areas);
    }
}
