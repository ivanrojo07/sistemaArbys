<?php

use App\Empleado;
use App\Gerente;
use App\Subgerente;
use App\Vendedor;
use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Empleado::find(1);
        $admin->gerente()->save(new Gerente());
        $admin->subgerente()->save(new Subgerente());
        $admin->vendedor()->save(new Vendedor(['experto' => 'Autos, Motos y Casas']));
    }
}
