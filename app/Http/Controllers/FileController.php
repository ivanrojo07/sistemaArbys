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
    public function importExportExcelORCSV() {
    	return view('excel.file_import_export');
    }

    public function importFileIntoDB(Request $request) {
    	if($request->hasFile('sample_file')) {
    		$path = $request->file('sample_file')->getPathName();
            $data = \Excel::load($path, null, null, true, null)->get();
            $x=[];
    		if($data->count()) {
                foreach ($data as $sheet) {
        			foreach ($data[0] as $key => $value) {
                        $x[] = [
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
                        ];
                    }
                    foreach ($data[1] as $key => $value) {
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
                            'cilindrada' => $value->cilindrada,
                            // 'precio_lista' => $value->precio_de_lista,
                            // 'm60' => $value['60'],
                            // 'm48' => $value['48'],
                            // 'm36' => $value['36'],
                            // 'm24' => $value['24'],
                            // 'm12' => $value['12'],
                            // 'apertura' => $value->apertura,
                            'marca' => $value->marca,
                            'tipo' => 'MOTO',
                            'categoria' => $value->tipo,
                            'created_at' => date('Y-m-d h:m:s'),
                            'updated_at' => date('Y-m-d h:m:s'),
                        ];
                    }
                }
    			if (!empty($arr)) {
                    // dd($arr);
                    Product::insert($arr);
    				return redirect()->back()->with('success', 'Archivo subido correctamente.');
    			} else
    				return redirect()->back()->with('error', 'Error al subir el archivo.');
    		} else
    			return redirect()->back()->with('error', 'Error al subir el archivo.');
    	} else
    		return redirect()->back()->with('error', 'No se subio ningun archivo');

    	return redirect()->back()->with('error', 'Error al subir el archivo.');
    }

    public function downloadExcelFile($type) {
    	$products = Product::get()->toArray();
    	return \Excel::create('productos', function($excel) use($products) {
			$excel->sheet('sheet name', function($sheet) use($products) {
				$sheet->fromArray($products);
			});
    	})->download($type);
    }

}