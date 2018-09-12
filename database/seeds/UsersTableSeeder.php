<?php

use App\User;
use App\Empleado;
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
        $empleado = Empleado::find(1)->first();
        $usuario = [
        	'perfil_id' => 1,
        	'empleado_id' => 1,
        	'name' => 'admin',
        	'email' => $empleado->email,
        	'password' => bcrypt('123456'),
        ];

        User::create($usuario);
    }
}
