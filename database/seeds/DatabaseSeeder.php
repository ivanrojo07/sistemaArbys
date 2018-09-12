<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PerfilsTableSeeder::class,
            ModulosTableSeeder::class,
            ModuloPerfilTableSeeder::class,
            AreasTableSeeder::class,
            PuestosTableSeeder::class,
            RegionsTableSeeder::class,
            EstadosTableSeeder::class,
            EmpleadosTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
