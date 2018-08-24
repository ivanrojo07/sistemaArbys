<?php

use App\Perfil;
use Illuminate\Database\Seeder;

class PerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$perfiles = ['nombre' => 'Admin'];

    	Perfil::create($perfiles);
    }
}
