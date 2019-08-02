<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcelProduct extends Model
{
    protected $fillable = [
        'clave',
        'descripcion',
        'precio_lista',
        'm60',
        'm48',
        'm36',
        'm24',
        'm12',
        'apertura',
        'marca',
        'tipo',
        'categoria',
        'tipo_moto',
        'cilindrada'
    ];
}
