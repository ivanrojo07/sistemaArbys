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

   	public $table = 'transactions';
   	
      protected $fillable = [
         'personal_id',
         'product_id'
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

}