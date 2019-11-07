<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\ExcelProduct;
use App\Laboral;
use Illuminate\Http\Request;

class PruebasController extends Controller
{
    public function create()
    {
        $productosExcel = ExcelProduct::where('tipo','like','%moto%');
    }
}
