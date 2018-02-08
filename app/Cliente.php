<?php

namespace App;


use App\Beneficiarios;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cliente extends Model
{
    use Sortable;
    //
    protected $table='clientes';

   protected $fillable = [
     	'tipopersona',//YA
        'nombre',//YA
        'apellidopaterno',//YA
        'apellidomaterno',//YA
        'calle',//YA
        'numext',//YA
        'numinter',//YA
        'cp',//YA
        'colonia',//YA
        'municipio',//YA
        'ciudad',//YA
        'estado',//YA
        'calle1',//YA
        'calle2',//YA
        'referencia',//YA
        'mail',//YA
        'rfc',//YA
        'telefono',//YA
        'telefonocel',//YA
        //'prod',//YA
        'ingresos',//YA
        'canalventa',//YA
        'promocion',//YA
        //'seguimiento',//YA
        'calificacion',//YA
        'comentarios',//YA
        //'listaprecios',//YA
        //'cotizador',//YA
        'identificador',//YA
        'objetivo',//YA
        'folio',//YA
        'razonsocial',//YA
        'solicitante_id'
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
      'folio',
      'tipopersona',
      'rfc',
      'calificacion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at'
    ];

      public function crm(){
        return $this->hasMany('App\ClienteCRM');
    }
   // public function datosLab(){
   //      return $this->hasOne(DatosLab::class);
   //  }
   //  public function beneficiarios(){
   //      return $this->hasMany(Beneficiarios::class);
   //  }
}
