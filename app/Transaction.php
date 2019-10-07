<?php

namespace App;

use App\Mail\MailCotizacion;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Mail;

class Transaction extends Model
{

	use Sortable;

	protected $table = 'transactions';
	
	protected $fillable = [
		'id',
		'cliente_id',
		'product_id',
		'oficina_id',
		'status',
	];
	
	protected $hidden = [
		'created_at',
		'updated_at'
	];

	public function cliente() {
		return $this->belongsTo('App\Cliente');
	}

	public function product() {
		return $this->belongsTo('App\Product');
	}

	public function pagos() {
		return $this->hasMany('App\Pago');
	}

	public function enviarTransaccion($email,$pdf)
    {
        $transaccion = $this;
        Mail::to($email)->send(new MailCotizacion($transaccion,$pdf));
    }

}