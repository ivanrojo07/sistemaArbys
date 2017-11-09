<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $table='products';
    protected $fillabble=['name','details'];
    protected $hidden = [
        'id','created_at', 'updated_at'
    ];
}
