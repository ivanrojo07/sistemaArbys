<?php

namespace App\Factories\Empleado;

use App\Repositories\Empleado\EmpleadoVendedorRepositorie;
use App\Repositories\Empleado\EmpleadoDirectorGeneralRepositorie;
use App\Repositories\Empleado\EmpleadoDirectorRegionalRepositorie;
use App\Repositories\Empleado\EmpleadoDirectorEstatalRepositorie;
use App\Repositories\Empleado\EmpleadoGerenteRepositorie;
use App\Repositories\Empleado\EmpleadoSubgerenteRepositorie;
use Illuminate\Support\Facades\Auth;

class EmpleadoRepositorieFactory{
    
    public function make($puesto){


        if(Auth::user()->id == 1){
            return new EmpleadoDirectorGeneralRepositorie;
        }

        switch ($puesto->nombre) {
            case 'Vendedor':
                return new EmpleadoVendedorRepositorie;
                break;
            
            case 'Subgerente':
                return new EmpleadoSubgerenteRepositorie;
                break;

            case 'Gerente':
                return new EmpleadoGerenteRepositorie;
                break;

            case 'Director Estatal':
                return new EmpleadoDirectorEstatalRepositorie;
                break;

            case 'Director Regional':
                return new EmpleadoDirectorRegionalRepositorie;
                break;

            case 'Director General':
                return new EmpleadoDirectorGeneralRepositorie;
                break;
            
            default:
                # code...
                break;
        }

    }

}