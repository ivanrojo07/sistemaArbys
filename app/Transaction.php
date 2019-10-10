<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

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

}