<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use UxWeb\SweetAlert\SweetAlert as Alert;

class Product extends Model
{

    use Sortable;

    public $table = 'products';

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
                         
    public $sortable = [
        'clave',
        'marca',
        'descripcion',
        'precio_lista',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function transactions() {
    	return $this->hasMany('App\Transaction');
    }

}
