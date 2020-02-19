<?php

namespace App\Services\Producto;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;
use App\ExcelProduct;
use App\Mensualidad;
use Exception;


class UpdateProductosService
{

    protected $arr;

    public function __construct($request)
    {
        // CARGAMOS LOS DATOS DEL ARCHIVO
        $path = $request->file('sample_file')->getPathName();
        $data = \Excel::load($path, null, null, true, null)->get();

        // dd($data);

        // VALIDAMOS QUE EL ARCHIVO TENGA DATOS
        if (!$data->count()) {
            return redirect()->back()->with('error', 'El archivo no contiene información.');
        }

        if ($request->input('tipo') == 'carros') {
            $this->setCarros($data);
        }

        if ($request->input('tipo') == 'motos') {
            $this->setMotos($data);
        }

        if (empty($this->arr)) {
            return redirect()->back()->with('error', 'Error al subir el archivo.');
        }

        /**
         * Inserta en la base de datos cada uno de los
         * productos y si ya existe lo actualiza
         */
        $this->updateProductos();

        // dd(ExcelProduct::get());
    }

    public function updateProductos()
    {
        foreach ($this->arr as $key => $product) {

            ExcelProduct::updateOrCreate(
                ['clave' => $product['clave']],
                $product
            );
            Product::updateOrCreate(
                ['clave' => $product['clave']],
                $product
            );
        }
    }

    public function setMotos($data)
    {
        foreach ($data as $key => $value) {


            try {
                $cilindrada = (int) preg_replace("/[^0-9]/", "", $value->cilindrada);
                $mostrar = strtolower($value->cot);

                $mostrar = $mostrar == 's' ? 1 : 0;

                if (!is_null($value->clave)) {
                    
                    // dd( number_format($value->precio_de_listas, 2, '.', '') );
                    // dd($value);

                    try {
                        $this->arr[] = [
                            'clave' => $value->clave,
                            'descripcion' => $value->descripcion,
                            'precio_lista' => number_format($value->precio_de_listas, 2, '.', ''),
                            'm60' => $this->calcularMensualidad(60, $value->precio_de_listas),
                            'm48' => $this->calcularMensualidad(48, $value->precio_de_listas),
                            'm36' => $this->calcularMensualidad(36, $value->precio_de_listas),
                            'm24' => $this->calcularMensualidad(24, $value->precio_de_listas),
                            'm12' => $this->calcularMensualidad(12, $value->precio_de_listas),
                            'apertura' => $this->getPrecioApertura($value->precio_de_listas),
                            'marca' => $value->marca,
                            'tipo' => $value->tipo,
                            'tipo_moto' => strtoupper($value->tipo),
                            'categoria' => $value->categoria,
                            'created_at' => date('Y-m-d h:m:s'),
                            'updated_at' => date('Y-m-d h:m:s'),
                            'cilindrada' => $cilindrada,
                            'mostrar' => $mostrar,
                        ];


                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error', 'Error en la estructura o en los datos propuestos del archivo excel.');
                    }
                }
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Verifica que la estructura de tu archivo sea correcta y que no tenga otras pestañas añadidas.');
            }
        }
    }

    public function getPrecioApertura($precioLista){


        if($precioLista <= 49990){
            return 1300;
        }

        if($precioLista <= 69990){
            return 2600;
        }
        
        if($precioLista <= 100000){
            return 3900;
        }

        if($precioLista <= 149990){
            return 5200;
        }

        if($precioLista <= 200000){
            return 6500;
        }

        if($precioLista <= 249990){
            return 7800;
        }

        if($precioLista <= 300000){
            return 9100;
        }

        if($precioLista <= 349990){
            return 10400;
        }

        return 0;

    }

    public function calcularMensualidad($meses, $monto)
    {

        $mensualidad = Mensualidad::where('meses', $meses)->first();
        // dd($mensualidad);
        // dd($monto);

        if (is_null($monto)) {
            return null;
        }

        if ($monto < $mensualidad->monto_minimo) {
            return null;
        }

        // dd(number_format(floatval($monto), 2, '.', '')*$mensualidad->factor_actualizacion);

        return number_format(floatval($monto), 2, '.', '')*$mensualidad->factor_actualizacion;

    }

    public function setCarros($data)
    {
        foreach ($data as $key => $value) {
            try {
                $this->arr[] = [
                    'clave' => $value->clave,
                    'descripcion' => $value->descripcion,
                    'precio_lista' => number_format($value->precio_de_lista, 2, '.', ''),
                    'm60' => is_numeric($value['60']) ? number_format($value['60'], 2, '.', '') : null,
                    'm48' => is_numeric($value['60']) ? number_format($value['48'], 2, '.', '') : null,
                    'm36' => is_numeric($value['60']) ? number_format($value['36'], 2, '.', '') : null,
                    'm24' => is_numeric($value['60']) ? number_format($value['24'], 2, '.', '') : null,
                    'm12' => is_numeric($value['60']) ? number_format($value['12'], 2, '.', '') : null,
                    'apertura' => number_format($value->apertura, 2, '.', ''),
                    'marca' => $value->marca,
                    'tipo' => 'CARRO',
                    'tipo_moto' => null,
                    'categoria' => $value->categoria,
                    'created_at' => date('Y-m-d h:m:s'),
                    'updated_at' => date('Y-m-d h:m:s'),
                    'cilindrada' => null
                ];
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Error en la estructura o en los datos propuestos del archivo excel.');
            }
        }
    }
}
