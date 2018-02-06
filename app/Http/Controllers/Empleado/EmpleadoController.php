<?php

namespace App\Http\Controllers\Empleado;
use App\EmpleadosDatosLab;
use App\Empleado;
use App\Area;
use App\Puesto;
use App\Sucursal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $empleados = Empleado::sortable()->paginate(10);
        $areas=Area::get();
        $puestos=Puesto::get();
        $sucursales=Sucursal::get();
        
        return view('empleado.index',[
            'empleados' => $empleados,
            'areas'     =>     $areas,
            'puestos'   =>   $puestos,
            'sucursales'=>$sucursales
            ]);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empleado = new Empleado;
        $edit = false;
        return view('empleado.create',['empleado'=>$empleado,'edit'=>$edit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rfc = Empleado::where('rfc',$request->rfc)->get();
        if (count($rfc)!=0) {
            # code...
            return redirect()->back()->with('errors','El RFC ya existe');
        }
        else {
            $empleado = Empleado::create($request->all());
            return redirect()->route('empleados.show',['empleado'=>$empleado])->with('success','Empleado Creado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        
        return view('empleado.view',['empleado'=>$empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
        $edit=true;
        return view('empleado.create',['empleado'=>$empleado,'edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
        $empleado->update($request->all());
        return redirect()->route('empleados.show',['empleado'=>$empleado])->with('success','Empleado Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }

//Añadido : Iyari 05/Dic/2017
    public function consulta()
    {
        return view('empleado.consulta');
    } 

    public function buscar(Request $request){
    
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $empleados = Empleado::where(function($q) use($wordsquery){ 
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',      "%$word%")
                ->orWhere('appaterno','LIKE', "%$word%")
                ->orWhere('apmaterno','LIKE', "%$word%")
                ->orWhere('rfc','LIKE',     "%$word%");
               
            }

        })->get();
    return view('empleado.busqueda', ['empleados'=>$empleados]);
        

    }
}
