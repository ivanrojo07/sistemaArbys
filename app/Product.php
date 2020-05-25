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
        'cilindrada',
        'mostrar',
        'lista_id'
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

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    /**
     * Scope methods
     */

    public function scopeActuales($query)
    {
        $ultimaLista = ListaProductos::orderBy('id', 'desc')->first();
        return $query->where('lista_id', $ultimaLista->id);
    }

    public function scopeCategoria($query, $categoria)
    {
        return $query->where('categoria', 'like', '%' . $categoria . '%');
    }

    public function scopeTipoMoto($query, $tipo_moto)
    {
        return $query->where('tipo_moto', 'like', '%' . $tipo_moto . '%');
    }

    public function scopePrecioMinimo($query, $precio_minimo)
    {
        return $query->where('precio_lista', '>=', $precio_minimo);
    }

    public function scopePrecioMaximo($query, $precio_maximo)
    {
        return $query->where('precio_lista', '<=', $precio_maximo);
    }
}
