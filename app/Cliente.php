<?php

namespace App;

use App\DatosLab;
use App\Beneficiarios;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Personal
{
    //

   public function datosLab(){
        return $this->hasOne(DatosLab::class);
    }
    public function beneficiarios(){
        return $this->hasMany(Beneficiarios::class);
    }
}
