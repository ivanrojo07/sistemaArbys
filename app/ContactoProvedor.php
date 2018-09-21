<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class ContactoProvedor extends Model
{
	use Sortable;

    protected $table = 'contactos_provedor';

    protected $fillable = [
    	'id',
    	'provedor_id',
    	'nombre',
    	'apater',
    	'amater',
    	'area',
    	'puesto',
    	'telefono1',
    	'ext1',
    	'telefono2',
    	'ext2',
    	'telefonodir',
    	'celular1',
    	'celular2',
    	'email1',
    	'email2'
    ];

    protected $hidden = [ 'created_at', 'updated_at','deleted_at'];
    
    public $sortable = ['nombre', 'apater', 'amater','area','email1','email2'];

    public function provedores() {
    	return $this->belongsTo(Provedor::class,'provedor_id');
    }
}
