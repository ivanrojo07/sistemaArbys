<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;
use App\ExcelProduct;
use Exception;

class FileController extends Controller
{
    //
    public function importExportExcelORCSV()
    {

        // Solo se puede actualizar el excel del día 1 al día 7
        $upgradeable = false;
        if ((int) date('d') <= 7) {
            $upgradeable = true;
        }

        return view('excel.file_import_export', compact('upgradeable'));
    }

    public function importFileIntoDB(Request $request)
    {

        // VALIDAMOS QUE LA PETICION TENGA UN ARCHIVO
        if (!$request->hasFile('sample_file')) {
            return redirect()->back()->with('error', 'No se subió ningún archivo');
        }

        // CARGAMOS LOS DATOS DEL ARCHIVO
        $path = $request->file('sample_file')->getPathName();
        $data = \Excel::load($path, null, null, true, null)->get();

        // dd($data);

        // VALIDAMOS QUE EL ARCHIVO TENGA DATOS
        if (!$data->count()) {
            return redirect()->back()->with('error', 'El archivo no contiene información.');
        }

        if ($request->input('tipo') == 'carros') {


            foreach ($data as $key => $value) {
                try {
                    $arr[] = [
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

        if ($request->input('tipo') == 'motos') {
            // dd('motos');
            // dd($data);
            foreach ($data as $key => $value) {


                try {
                    $cilindrada = (int) preg_replace("/[^0-9]/", "", $value->cilindrada);
                    $mostrar = strtolower($value->cot);

                    $mostrar = $mostrar == 's' ? 1 : 0;
                    


                    if (!is_null($value->clave)) {
                        try {
                            $arr[] = [
                                'clave' => $value->clave,
                                'descripcion' => $value->descripcion,
                                'precio_lista' => number_format($value->precio_de_listas, 2, '.', ''),
                                'm60' => !is_null($value['60_mens']) ? number_format(floatval($value['60_mens']), 2, '.', '') : null,
                                'm48' => !is_null($value['48_mens']) ? number_format(floatval($value['48_mens']), 2, '.', '') : null,
                                'm36' => !is_null($value['36_mens']) ? number_format(floatval($value['36_mens']), 2, '.', '') : null,
                                'm24' => !is_null($value['24_mens']) ? number_format(floatval($value['24_mens']), 2, '.', '') : null,
                                'm12' => !is_null($value['12_mens']) ? number_format(floatval($value['12_mens']), 2, '.', '') : null,
                                'apertura' => number_format($value->apertura, 2, '.', ''),
                                'marca' => $value->marca,
                                'tipo' => $value->tipo,
                                'tipo_moto' => strtoupper($value->tipo),
                                'categoria' => $value->categoria,
                                'created_at' => date('Y-m-d h:m:s'),
                                'updated_at' => date('Y-m-d h:m:s'),
                                'cilindrada' => $cilindrada,
                                'mostrar' => $mostrar,
                            ];

                            // if($mostrar != 1){
                            //     dd($arr);
                            // }
                            
                        } catch (\Throwable $th) {
                            return redirect()->back()->with('error', 'Error en la estructura o en los datos propuestos del archivo excel.');
                        }
                    }
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error', 'Verifica que la estructura de tu archivo sea correcta y que no tenga otras pestañas añadidas.');
                }
            }
        }

        if (empty($arr)) {
            return redirect()->back()->with('error', 'Error al subir el archivo.');
        }

        /**
         * Inserta en la base de datos cada uno de los
         * productos y si ya existe lo actualiza
         */
        foreach ($arr as $key => $product) {

            ExcelProduct::updateOrCreate(
                ['clave' => $product['clave']],
                $product
            );
            Product::updateOrCreate(
                ['clave' => $product['clave']],
                $product
            );
        }

        // dd(ExcelProduct::get());

        return redirect()->back()->with('success', 'Archivo subido correctamente.');
    }

    public function downloadExcelFile($type)
    {

        $products_cars = Product::where('tipo', 'CARRO')->get()->toArray();
        $products_motorcycles = Product::where('tipo', 'MOTO')->get()->toArray();

        $products = Product::get()->toArray();
        return \Excel::create('productos', function ($excel) use ($products_cars, $products_motorcycles) {

            $excel->sheet('CARROS', function ($sheet) use ($products_cars) {
                $sheet->fromArray($products_cars);
            });

            $excel->sheet('MOTOS', function ($sheet) use ($products_motorcycles) {
                $sheet->fromArray($products_motorcycles);
            });
        })->download($type);
    }
}
