<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\Product;
use Kyslik\ColumnSortable\Sortable;
class Transaction extends Model
{
    //
   	use Sortable;
   	public $table='transactions';
   	protected $fillable=['id','personal_id','product_id'];
   	public $sortable=['id'];
   	protected $hidden=['created_at','updated_at'];

   	public function cliente(){
   		return $this->belongsTo(Cliente::class);
   	}
   	public function product(){
   		return $this->belongsTo('App\Product');
   	}

}
