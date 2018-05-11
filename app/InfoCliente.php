<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Solicitante;

class InfoCliente extends Model
{
   protected $table='info_clientes';

   protected $fillable = ['cliente_id',
						  'ingreso',
						  'monto',
						  'calificacion'];

   protected $hidden = ['deleted_at'];

   public function cliente(){
        return $this->belongsTo('App\Cliente');
    }
}
