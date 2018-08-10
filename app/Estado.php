<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Estado extends Model
{

    use Sortable;

    protected $fillable = [
    	'id',
    	'region_id',
        'nombre',
        'abreviatura'
    ];

    public $sortable = [ 'id', 'nombre' ];

    protected $hidden=[ 'created_at', 'updated_at' ];

    public function region() {
        return $this->belongsTo('App\Region');
    }

    public function oficinas() {
        return $this->hasMany('App\Oficina');
    }

}
