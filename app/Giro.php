<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Giro extends Model
{
    //
    use Sortable;
    protected $table = 'giro';
    protected $fillable=['id','nombre','etiqueta'];
    protected $hidden=[ 'created_at', 'updated_at'];
    public $sortable=['id','nombre', 'etiqueta'];
}
