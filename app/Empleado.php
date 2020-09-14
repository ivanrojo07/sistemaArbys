<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Empleado extends Model
{
    use Sortable;
    use SoftDeletes;

    protected $table = 'empleados';

    protected $fillable = [
        'id',
        'nombre',
        'appaterno',
        'apmaterno',
        'rfc',
        'telefono',
        'movil',
        'email',
        'nss',
        'curp',
        'infonavit',
        'nacimiento',
        'tipo_empleado',
        'homoclave'
    ];

    public $sortable = [
        'nombre', 'appaterno', 'apmaterno', 'rfc'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function direccion()
    {
        return $this->hasOne('App\Direccion');
    }

    public function laborales()
    {
        return $this->hasMany('App\Laboral');
    }

    public function gerente()
    {
        return $this->hasOne('App\Gerente');
    }

    public function subgerente()
    {
        return $this->hasOne('App\Subgerente');
    }

    public function vendedor()
    {
        return $this->hasOne('App\Vendedor');
    }

    public function estudios()
    {
        return $this->hasOne('App\EmpleadosEstudios');
    }

    public function emergencias()
    {
        return $this->hasOne('App\EmpleadosEmergencias');
    }

    public function vacaciones()
    {
        return $this->hasMany('App\EmpleadosVacaciones');
    }

    public function faltasAdmin()
    {
        return $this->hasMany('App\EmpleadosFaltasAdministrativas');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function puesto()
    {
        return $this->laborales()->orderBy('id', 'desc')->first()->puesto();
    }

    public function estado()
    {
        return $this->laborales()->orderBy('id', 'desc')->first()->estado();
    }

    public function oficina()
    {
        return $this->laborales()->orderBy('id', 'desc')->first()->oficina();
    }
     public function vendedors()
    {
        return $this->belongsTo('App\Vendedor');
    }


    // ==========
    // ATTRIBUTES
    // ==========

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . " " . $this->appaterno . " " . $this->apmaterno;
    }
}
