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
    		$data = Excel::load($path)->get();
    		if ($data->count()) {
    			# code...
    			foreach ($data as $key => $value) {
    				# code...
    				$arr[]=['name'=>$value->name,'details'=>$value->details];
    			}
    			if (!empty($arr)) {
    				# code...
    				DB::table('products')->insert($arr);
    				dd('los datos se insertaron correctamente');
    			} else {
    				# code...
    				dd('error, el archivo esta vacio');
    			}
    			
    		} else {
    			# code...
    			dd('error, no puedo leer el archivo')
    		}
    		
    	} else {
    		# code...
    		dd('error, archivo incompatible')
    	}
    	dd('error, no subio ningun archivo');
    }
    public function downloadExcelFile($type){
    	$products = Product::get()->toArray();
    	return Excel::create('expertphp_demo', function($excel) use($products){
    			$excel->sheet('sheet name', function($sheet) use($products){
    				$sheet->fromArray($products);
    			})
    	})->download($type);
    }
}
