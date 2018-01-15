<?php

namespace App\Http\Controllers\Provedor;


use App\DatosGeneralesProvedor;
use App\FormaContacto;
use App\Giro;
use App\Http\Controllers\Controller;
use App\Provedor;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ProvedorDatosGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedore)
    {
        //
        $datos = $provedore->datosGeneralesProvedor;
        if ($datos==null) {
            # code...
            return redirect()->route('provedores.datosgenerales.create',['provedore'=>$provedore]);;
        }
        else{
            $giro = Giro::find($datos->giro_id);
            $formaContacto = FormaContacto::find($datos->forma_contacto_id);
            // dd($giro);
            return view('datosgeneralesprovedores.view',['datos'=>$datos, 'provedore'=>$provedore, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provedor $provedore)
    {
        //
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        // dd($giros);}
        return view('datosgeneralesprovedores.create',['provedore'=>$provedore, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Provedor $provedore)
    {
        //
        // dd($request->all());

        
        $datos = DatosGeneralesProvedor::create($request->all());
        Alert::success('Datos generales creados con éxito');
        return redirect()->route('provedores.datosgenerales.index',['provedore'=>$provedore]);;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedore)
    {
        
        $datos = $provedore->datosGeneralesProvedor;
        
        $giro='';
      if($datos->giro_id==null){
        $giro='NO DEFINIDO';
      }else{
        $giros=Giro::where('id',$datos->giro_id);
      $giro=$giros->nombre;
      }

       $formaContacto='';
      if($datos->forma_contacto_id==null){
        $formaContacto='NO DEFINIDO';
      }else{
        $formaContactos=FormaContacto::where('id',$datos->forma_contacto_id);
      $formaContacto=$formaContactos->nombre;
      }
        

        
       
        return view('datosgeneralesprovedores.view',
        ['datos'=>$datos, 'provedore'=>$provedore, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedore)
    {
         
        $datos = $provedore->datosGeneralesProvedor;
        
        $giros = Giro::get();
        
        $formaContactos = FormaContacto::get();
        return view('datosgeneralesprovedores.edit',
        ['provedore'=>$provedore, 'datos'=>$datos, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedore, DatosGeneralesProvedor $datosgenerale)
    {
        //
        //dd($request->all());
        $datosgenerale->update($request->all());


        //$giro = Giro::findorFail($datosgenerale->giro_id);

       $giro='';
      if($request->giro_id==null){
        $giro='NO DEFINIDO';
      }else{
        $giros=Giro::where('id',$datosgenerale->giro_id);
      $giro=$giros->nombre;
      }
 
//$formaContacto = FormaContacto::findorFail($datosgenerale->
//forma_contacto_id);

 $formaContacto='';
      if($request->forma_contacto_id==null){
        $formaContacto='NO DEFINIDO';
      }else{
        $formaContactos=FormaContacto::where('id',$datosgenerale->forma_contacto_id);
      $formaContacto=$formaContactos->nombre;
      }
          
        Alert::success('Datos generales actualizados con éxito');
        return view('datosgeneralesprovedores.view',['datos'=>$datosgenerale,'provedore'=>$provedore, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $provedore)
    {
        //
    }
}
