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
    		$path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();
    		if ($data->count()) {
    			# code...
    			foreach ($data as $key => $value) {
    				# code...
    				$arr[]=['name'=>$value->name,'details'=>$value->details];
    			}
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
