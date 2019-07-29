<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

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
        if ($request->hasFile('sample_file')) {
            $path = $request->file('sample_file')->getPathName();
            $data = \Excel::load($path, null, null, true, null)->get();
            if ($data->count()) {
                // foreach ($data as $sheet) {
                foreach ($data[0] as $key => $value) {
                    $arr[] = [
                        'clave' => $value->clave,
                        'descripcion' => $value->descripcion,
                        'precio_lista' => number_format($value->precio_de_lista, 2, '.', ''),
                        'm60' => number_format($value['60'], 2, '.', ''),
                        'm48' => number_format($value['48'], 2, '.', ''),
                        'm36' => number_format($value['36'], 2, '.', ''),
                        'm24' => number_format($value['24'], 2, '.', ''),
                        'm12' => number_format($value['12'], 2, '.', ''),
                        'apertura' => number_format($value->apertura, 2, '.', ''),
                        'marca' => $value->marca,
                        'tipo' => 'CARRO',
                        'categoria' => $value->categoria,
                        'created_at' => date('Y-m-d h:m:s'),
                        'updated_at' => date('Y-m-d h:m:s'),
                        'cilindrada' => null
                    ];
                }
                foreach ($data[1] as $key => $value) {

                    // Pasando cilindrada a entero
                    $cilindrada = (int) preg_replace("/[^0-9]/", "", $value->cilindrada);

                    $arr[] = [
                        'clave' => $value->clave,
                        'descripcion' => $value->descripcionmodelo,
                        'precio_lista' => number_format($value->precio_de_listas, 2, '.', ''),
                        'm60' => number_format($value['60'], 2, '.', ''),
                        'm48' => number_format($value['48'], 2, '.', ''),
                        'm36' => number_format($value['36'], 2, '.', ''),
                        'm24' => number_format($value['24'], 2, '.', ''),
                        'm12' => number_format($value['12'], 2, '.', ''),
                        'apertura' => number_format($value->apertura, 2, '.', ''),
                        'marca' => $value->marca,
                        'tipo' => 'MOTO',
                        'categoria' => $value->categoria,
                        'created_at' => date('Y-m-d h:m:s'),
                        'updated_at' => date('Y-m-d h:m:s'),
                        'cilindrada' => $cilindrada
                    ];
                }
                // }
                if (!empty($arr)) {

                    /**
                     * Inserta en la base de datos cada uno de los
                     * productos y si ya existe lo actualiza
                     */
                    foreach ($arr as $product) {
                        Product::updateOrCreate(
                            ['clave' => $product['clave']],
                            $product
                        );
                    }

                    return redirect()->back()->with('success', 'Archivo subido correctamente.');
                } else
                    return redirect()->back()->with('error', 'Error al subir el archivo.');
            } else
                return redirect()->back()->with('error', 'Error al subir el archivo.');
        } else
            return redirect()->back()->with('error', 'No se subio ningun archivo');

        return redirect()->back()->with('error', 'Error al subir el archivo.');
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
