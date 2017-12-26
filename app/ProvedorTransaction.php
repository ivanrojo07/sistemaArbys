<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provedor;
use App\Product;
use Kyslik\ColumnSortable\Sortable;
class ProvedorTransaction extends Model
{
    //
   	use Sortable;
   	public $table='transactions';
   	protected $fillable=['id','provedor_id','product_id'];
   	public $sortable=['id'];
   	protected $hidden=['created_at','updated_at'];

   	public function cliente(){
   		return $this->belongsTo(Provedor::class);
   	}
   	public function product(){
   		return $this->belongsTo('App\Product');
   	}

}
