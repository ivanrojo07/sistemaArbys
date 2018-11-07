<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
     protected $table = 'pagos';

     protected $fillable = [
     	'cliente_id',
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
	    'nombre_tarjetaHabiente',
	    'meses',
	    'referencia',
	    'folio',
	    'total',
	    'restante',
	];

 	public function transaction() {
 		return $this->belongsTo('App\Transaction');
 	}
 	
}
