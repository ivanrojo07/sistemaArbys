<?php

use App\Modulo;
use App\Perfil;
use Illuminate\Database\Seeder;

class ModuloPerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Perfil::find(1)->modulos()->attach(Modulo::get());
    }
}
