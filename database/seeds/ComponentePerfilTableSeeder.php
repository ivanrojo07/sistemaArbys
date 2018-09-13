<?php

use App\Componente;
use App\Perfil;
use Illuminate\Database\Seeder;

class ComponentePerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Perfil::find(1)->componentes()->attach(Componente::get());
    }
}
