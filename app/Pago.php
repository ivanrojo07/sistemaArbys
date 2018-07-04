<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
     protected $table = 'pagos';

     protected $fillable = ['cliente_id',
 							'usuario_id',
 							'product_id',
 						    'identificacion',
 						    'comprobante',
 						    'forma_pago',
 						    'banco',
 						    'status',
 						    'monto',
 						    'numero_cheque',
 						    'numero_deposito',
 						    'numero_tarjeta',
 						    'nombre_tarjetaHabiente'];

 	protected $hidden=['deleted_at'];

 	public function cliente(){

 		return $this->belongsTo('App\Cliente');
 	}

 	public function usuario(){

 		return $this->belongsTo('App\User');
 	}

 	public function product(){

 		return $this->belongsTo('App\Product');
 	}
}
