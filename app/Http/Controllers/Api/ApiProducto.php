<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ApiProducto extends Controller
{
    public function get( Request $request ){

        $productos = Product::where('id','>',0);

        if($request->mes_lista){
            $productos = $productos->whereMonth('fecha_lista',$request->mes_lista);
        }

        return response()->json( [
            'totalProductos' => $productos->get()->count()
        ] );
    }
}
