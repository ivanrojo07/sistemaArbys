<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Gasto extends Model
{
    //
    use Sortable, SoftDeletes;

    protected $table = 'gastos';

    protected $fillable=['
    id',
    'descripcion',
    'monto',
    'sucursal_id',
    'almacen_id'];

    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['id','descripcion', 'monto'];

    public function sucursal(){
        return $this->belongsTo('App\Sucursal', 'sucursal_id');
    }
    public function almacen(){
        return $this->belongsTo('App\Almacen', 'almacen_id');
    }

}
