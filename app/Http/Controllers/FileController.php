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
    public function importExportExcelORCSV(){
    	return view('excel.file_import_export');
    }

    public function importFileIntoDB(Request $request){
    	if ($request->hasFile('sample_file')) {
    		# code...
            // dd($request->file('sample_file')->getPathName());
    		$path = $request->file('sample_file')->getPathName();
            // dd($path);
            $data = \Excel::load($path,null,null,true,null)->get();
    		if ($data->count()) {
    			# code...
                // dd($data);
    			foreach ($data as $key => $value) {
    				# code...
    				$arr[]=['clave'=>$value->clave,'descripcion'=>$value->descripcion, 'precio_lista'=>$value->precio_de_lista,'mensualidad_p_fisica'=>$value->pago_mensual_p_fisica,'mensualidad_p_moral'=>$value->p_moral,'apertura'=>$value->apertura,'inicial'=>$value->inicial,'marca'=>$value->marca, 'tipo'=>$value->tipo,'created_at'=>date('Y-m-d H:i:s')];
                }
                // dd($arr);
    			if (!empty($arr)) {
    				# code...
    				DB::table('products')->insert($arr);
    				return redirect()->back()->with('success', 'Archivo subido correctamente.');
    			} else {
    				# code...
    				return redirect()->back()->with('error', 'Error al subir el archivo.');
    			}
    			
    		} else {
    			# code...
    			return redirect()->back()->with('error', 'Error al subir el archivo.');
    		}
    		
    	} else {
    		# code...
    		return redirect()->back()->with('error', 'No se subio ningun archivo');
    	}
    	return redirect()->back()->with('error', 'Error al subir el archivo.');
    }
    public function downloadExcelFile($type){
    	$products = Product::get()->toArray();
    	return \Excel::create('productos', function($excel) use($products){
    			$excel->sheet('sheet name', function($sheet) use($products){
    				$sheet->fromArray($products);
    			});
    	})->download($type);
    }
}
