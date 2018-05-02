<?php

namespace App;


use App\Beneficiarios;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Solicitante;

class Cliente extends Model
{
    use Sortable;
    //
    protected $table='clientes';

   protected $fillable = [
        'identificador',
     	'tipopersona',//YA
        'nombre',//YA
        'apellidopaterno',//YA
        'apellidomaterno',//YA
        'cp',//YA
        'mail',//YA
        'rfc',//YA
        'telefono',//YA
        'telefonocel',//YA
        'comentarios',//YA
        'razonsocial',
        'fecha_nacimiento',
        'canal_ventas'
        ];
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $Sortable = [
    	'identificador',
    	'nombre',
      'razonsocial',
      'apellidopaterno',
      'tipopersona',
      'rfc',
      'canal_ventas',
      'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];

    public function crm(){
        return $this->hasMany('App\ClienteCRM');
    }
        public function product(){
        return $this->hasMany('App\Product');
    }
    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
    public function solicitante(){
        // return $this->hasOne(Solicitante::class, 'cliente_id');
        return $this->hasOne('App\Solicitante', 'cliente_id', 'id');
    }
   //  public function beneficiarios(){
   //      return $this->hasMany(Beneficiarios::class);
   //  }
}
