<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Provedor extends Model
{
    use Sortable, SoftDeletes;

    protected $table='proveedores';

    protected $fillable = [
        'id',
        'tipopersona',
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'razonsocial',
        'alias',
        'rfc',
        'vendedor',
        'email',
        'calle',
        'numext',
        'numinter',
        'colonia',
        'municipio',
        'ciudad',
        'estado',
        'calle1',
        'calle2',
        'referencia'
    ];
    
    public $sortable = ['id', 'nombre','apellidopaterno','apellidomaterno', 'razonsocial', 'email'];

    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at'
    ];

    public function direccionFisicaProvedor(){
        return $this->hasOne('App\DireccionFisicaProvedor');
    }

    public function contactosProvedor(){
        return $this->hasMany('App\ContactoProvedor');
    }

    public function datosGeneralesProvedor(){
        return $this->hasOne('App\DatosGeneralesProvedor');
    }

    public function datosBancarios(){
        return $this->hasOne('App\DatosBancariosProveedor');
    }
}