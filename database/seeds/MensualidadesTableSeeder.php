<?php

use App\Mensualidad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensualidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensualidades')->insert([
            [
                'meses' => 12,
                'factor_actualizacion' => 10.3946,
                'monto_minimo' => 20002.00,
                'concepto' => 'Moto',
            ],
            [
                'meses' => 24,
                'factor_actualizacion' => 5.7807,
                'monto_minimo' => 20000.00,
                'concepto' => 'Moto',
            ],
            [
                'meses' => 36,
                'factor_actualizacion' => 1.2083,
                'monto_minimo' => 20000.00,
                'concepto' => 'Moto',
            ],
            [
                'meses' => 48,
                'factor_actualizacion' => 10.3946,
                'monto_minimo' => 20000.00,
                'concepto' => 'Moto',
            ],
            [
                'meses' => 60,
                'factor_actualizacion' => 1.16666,
                'monto_minimo' => 20000.00,
                'concepto' => 'Moto',
            ],
            [
                'meses' => 12,
                'factor_actualizacion' => 10.3946,
                'monto_minimo' => 20002.00,
                'concepto' => 'Carro',
            ],
            [
                'meses' => 24,
                'factor_actualizacion' => 5.7807,
                'monto_minimo' => 20000.00,
                'concepto' => 'Carro',
            ],
            [
                'meses' => 36,
                'factor_actualizacion' => 1.2083,
                'monto_minimo' => 20000.00,
                'concepto' => 'Carro',
            ],
            [
                'meses' => 48,
                'factor_actualizacion' => 10.3946,
                'monto_minimo' => 20000.00,
                'concepto' => 'Carro',
            ],
            [
                'meses' => 60,
                'factor_actualizacion' => 1.16666,
                'monto_minimo' => 20000.00,
                'concepto' => 'Carro',
            ]
        ]);
    }
}
