<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = [
        	'perfil_id' => 1,
        	'puesto_id' => 1,
        	'area_id' => 1,
        	'name' => 'armndo',
        	'email' => 'armndo.g@gmail.com',
        	'password' => bcrypt('123456'),
        	'nombre' => 'Armando',
        	'appaterno' => 'González',
        	'apmaterno' => 'González'
        ];

        User::create($usuario);
    }
}
