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
            ComponentesTableSeeder::class,
            ComponentePerfilTableSeeder::class,
            AreasTableSeeder::class,
            PuestosTableSeeder::class,
            ContratosTableSeeder::class,
            RegionsTableSeeder::class,
            EstadosTableSeeder::class,
            EmpleadosTableSeeder::class,
            LaboralsTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
