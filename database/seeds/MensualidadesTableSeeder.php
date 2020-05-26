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
                'concepto' => 'Moto',
                'monto_minimo' => 20000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 24,
                'concepto' => 'Moto',
                'monto_minimo' => 30000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 36,
                'concepto' => 'Moto',
                'monto_minimo' => 40000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 48,
                'concepto' => 'Moto',
                'monto_minimo' => 50000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 60,
                'concepto' => 'Moto',
                'monto_minimo' => 60000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 12,
                'concepto' => 'Carro',
                'monto_minimo' => 100000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 24,
                'concepto' => 'Carro',
                'monto_minimo' => 200000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 36,
                'concepto' => 'Carro',
                'monto_minimo' => 300000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 48,
                'concepto' => 'Carro',
                'monto_minimo' => 400000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 60,
                'concepto' => 'Carro',
                'monto_minimo' => 500000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 12,
                'concepto' => 'Casa',
                'monto_minimo' => 1000000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 24,
                'concepto' => 'Casa',
                'monto_minimo' => 2000000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 36,
                'concepto' => 'Casa',
                'monto_minimo' => 3000000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 48,
                'concepto' => 'Casa',
                'monto_minimo' => 4000000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ],
            [
                'meses' => 60,
                'concepto' => 'Casa',
                'monto_minimo' => 5000000,
                'factor_actualizacion' => 10.5,
                'aportacion' => 1,
                'gastos_administracion' => 2,
                'iva_gda' => 4,
                'seguro_vida' => 2,
                'porcentaje_compensatorio' => 1.5 
            ]
        ]);
    }
}
