<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Solicitante extends Model
{
    use Sortable;
    //
    protected $table='solicitantes';

   protected $fillable = [
     	'integrante',
        'cliente_id',
        'clave_unidad',
        'tipo_unidad',
        'costo',
        'cuota_mensual',
        'plazo',
        'num_tarifa',
        'clave_asesor',
        'nombre_asesor',
        'nombre_sol',
        'razon',
        'calle',
        'num_int',
        'num_ext',
        'colonia',
        'delegacionmunicipio',
        'cp',
        'ciudad',
        'estado',
        'correo',
        'telefono',
        'RFC',
        'tiempo_residir',
        'tipo_vivienda',
        'nombre_conyuge',
        'estado_civil',
        'genero',
        'sociedad_conyugal',
        'carpeta_integrante',
        'celular',
        'nombre_rep_leg',
        'direccion_rep_leg',
        'telefono_rep_leg',
        'correo_rep_leg',
        'razon_empresa',
        'giro_empresa',
        'direccion_empresa',
        'puesto',
        'antiguedad_empresa',
        'ingresos',
        'telefono_empresa',
        'correo_empresa',
        'nombre_ref1',
        'telefono_ref1',
        'correo_ref1',
        'nombre_ref2',
        'telefono_ref2',
        'correo_ref2',
        'cuota_insc',
        'cuota_mensual_pago',
        'importe_recibo',
        'cantidad_letra',
        'cuenta_cheques',
        'banco',
        'num_cuenta',
        'otra_cuenta',
        'banco2',
        'num_tarjeta_credito',
        'num_cuenta2',
        'nombre_benef',
        'edad_benef',
        'parentesco',
        'telefono_benef'
        ];
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $Sortable = [
    	'cliente_id',
    	'numgrupo',
        'integrante',
        'folio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function cliente(){
       return $this->belongsTo('App\Cliente');
    }
    
   // public function datosLab(){
   //      return $this->hasOne(DatosLab::class);
   //  }
}
