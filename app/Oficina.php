<?php

use App\Laboral;
use App\Empleado;

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Oficina extends Model
{

    use Sortable;

    protected $fillable = [
        'id',
        'estado_id',
        'nombre',
        'abreviatura',
        'responsable_com',
        'responsable_adm',
        'gerente_id',
        'descripcion',
        'calle',
        'numext',
        'colonia',
        'numint',
        'cp',
        'delegacion',
        'ciudad',
        'telefono1',
        'telefono2',
        'telefono3',
    ];

    public $sortable = ['id', 'nombre', 'abreviatura', 'responsable'];

    protected $hidden = ['created_at', 'updated_at'];

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function puntosDeVenta()
    {
        return $this->hasMany('App\PuntoDeVenta');
    }

    public function laborales()
    {
        return $this->hasMany('App\Laboral');
    }

    public function gerente()
    {
        return $this->belongsTo('App\Gerente');
    }

    public function empleadoDirectorEstatal()
    {
        $laboral =  Laboral::where('puesto_id', 4)->where('estado_id', $this->estado_id)->get()->last();

        if ($laboral) {
            return Empleado::where('id', $laboral->empleado_id)->first();
        }

        return null;
    }

    public function empleadoDirectorRegional()
    {
        $directorRegional = null;
        $region = $this->estado()->get()->first()->region()->first();
        if($region){
            $laboral = Laboral::where('puesto_id', 3)->where('region_id', $region->id)->get()->last();
            if($laboral){
                $directorRegional = Empleado::where('id',$laboral->empleado_id)->first();
            }
        }
        return $directorRegional;
    }
}
