<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Empleado extends Model
{
	use Sortable;

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
        'nacimiento'
    ];
    
    public $sortable = [
    	'nombre', 'appaterno', 'apmaterno', 'rfc'
    ];

    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function direccion() {
        return $this->hasOne('App\Direccion');
    }
    
    public function laborales() {
        return $this->hasMany('App\EmpleadosDatosLab');
    }
    
    public function subgerente() {
        return $this->hasOne('App\Subgerente');
    }
    
    public function vendedor() {
        return $this->hasOne('App\Vendedor');
    }

    public function estudios(){
        return $this->hasOne('App\EmpleadosEstudios');
    }

    public function emergencias() {
        return $this->hasOne('App\EmpleadosEmergencias');
    }

    public function vacaciones(){
        return $this->hasMany('App\EmpleadosVacaciones');
    }

    public function faltasAdmin(){
        return $this->hasMany('App\EmpleadosFaltasAdministrativas');
    }

    public function user() {
        return $this->hasOne('App\User');
    }
}
