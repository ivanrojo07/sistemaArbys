<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $table='integrantes';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
