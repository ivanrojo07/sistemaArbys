<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cliente extends Model
{
    use Sortable;

    protected $table = 'clientes';

    protected $fillable = [
        'id',
        'vendedor_id',
        'identificador',
     	'tipo',
        'nombre',
        'appaterno',
        'apmaterno',
        'razon',
        'nacimiento',
        'rfc',
        'email',
        'telefono',
        'movil',
        'canal',
        'comentarios',
    ];

    public function crm() {
        return $this->hasMany('App\ClienteCRM');
    }

    public function vendedor() {
        return $this->belongsTo('App\Vendedor');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
    
    public function solicitante() {
        return $this->hasMany('App\Solicitante', 'cliente_id', 'id');
    }

    public function prestamos() {
        return $this->hasMany('App\Prestamo');
    }

    public function integrante(){
        return $this->hasOne('App\Integrante');
    }

}