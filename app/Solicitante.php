<?php

namespace App;


use App\Beneficiarios;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Solicitante extends Model
{
    use Sortable;
    //
    protected $table='solicitantes';

   protected $fillable = [
     	'cliente_id',
        'tiemporesidir',
        'tipovivienda',
        'estadocivil',
        'nombreempresa',
        'giro',
        'puesto',
        'antiguedad',
        'telefono1',
        'telefono2',
        'nombre1',
        'telefonoref1',
        'parentesco1',
        'nombre2',
        'telefonoref2',
        'parentesco2',
        'folio',
        'fechasolicitud',
        'fechacontrato',
        'fechapago',
        'fechaentrega',
        'refcontrato',
        'refapertura',
        'nombrebeneficiario',
        'edadbeneficiario',
        'telbeneficiario',
        'numcontrato',
        'numgrupo',
        'integrante'
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
   //  public function beneficiarios(){
   //      return $this->hasMany(Beneficiarios::class);
   //  }
}
