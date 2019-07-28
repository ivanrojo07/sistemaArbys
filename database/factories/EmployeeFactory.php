<?php

use Faker\Generator as Faker;
use App\Empleado;

$factory->define(App\Empleado::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'appaterno' => $faker->name,
        'apmaterno' => $faker->name,
        'rfc' => Str::random(10),
        // 'telefono' => Faker::PhoneNumber.phone_number,
        'movil',
        'email',
        'nss',
        'curp',
        'infonavit',
        'nacimiento',
        'tipo_empleado',
        'homoclave'
    ];
});
