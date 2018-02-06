<?php

namespace App;

use App\DatosLab;
use App\Beneficiarios;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cliente extends Model
{
    use Sortable;
    //
    protected $table='clientes';

   protected $fillable = [
     	'id',
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'rfc',
        'mail',
        'telefono',
        'identificador'];
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $Sortable = [
    	'identificador',
    	'nombre'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at'
    ];

   // public function datosLab(){
   //      return $this->hasOne(DatosLab::class);
   //  }
   //  public function beneficiarios(){
   //      return $this->hasMany(Beneficiarios::class);
   //  }
}
