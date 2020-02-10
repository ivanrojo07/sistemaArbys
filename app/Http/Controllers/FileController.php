<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;
use App\ExcelProduct;
use App\Services\Producto\UpdateProductosService;
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

        $updateProductosService = new UpdateProductosService($request);

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
