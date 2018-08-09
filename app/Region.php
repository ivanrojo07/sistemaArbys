<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Region extends Model
{
    //
    use Sortable;

    protected $fillable = [
		'id',
		'nombre',
		'abreviatura'
	];

    public $sortable = [ 'id', 'nombre' ];

    protected $hidden=[ 'created_at', 'updated_at' ];

    public function estados() {
        return $this->hasMany('App\Estado');
    }

}
