<?php

namespace App\Http\Controllers\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Personal;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personals = Personal::sortable()->paginate(10);
        // dd($personals);
        return view('personal.index',['personals'=>$personals]);
    }
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        return view('personal.create');
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
        // dd($request->all());
        $rfc = Personal::where('rfc', $request->rfc)->get();
        if (count($rfc)!=0) {
            # code...
            return redirect()->back()->with('errors','El RFC ya existe');                               
        } else {
            # code...

            $personal = Personal::create($request->all());
            if ($request['tipo'] == 'Cliente') {
                Alert::success('Cliente creado con éxito', 'Siga agregando información');
                return redirect()->route('personals.datoslaborales.index', ['personal'=>$personal]);
            }
            if($request['tipo'] == 'Prospecto') {
                Alert::success('Prospecto creado con éxito');
                return redirect()->route('personals.index');
            }   
        }
        

        // return redirect('/personals');
        // return response()->json($request['tipo']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
        // var_dump($personal->id);
        return view('personal.view',['personal'=>$personal]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        //
        // dd($personal);
        return view('personal.edit',['personal'=>$personal]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        //
        // dd($request->all());
        $personal->update($request->all());
        // Personal::where('id',$personal->id)->update($request->all());
        if ($request['tipo'] == 'Cliente') {
            Alert::success('Cliente modificado con éxito');
            return redirect()->route('personals.datoslaborales.index', ['personal'=>$personal]);
        }
        if($request['tipo'] == 'Prospecto') {
            Alert::success('Prospecto modificado con éxito');
            return redirect()->route('personals.index');
        }
        // return redirect('/personals');
        // $personal->fill($request->all());
        // $personal->save();
        // return redirect('personals');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }

    public function search(Request $request){
        //dd($request->input('pro'));
        $query = $request->input('busqueda');
        //dd($request->inpu('cli'));
        if (($request->input('cli') == "true" && $request->input('pro') == "true") || (!$request->input('cli') && !$request->input('pro'))) {
            # code...
            $personals = Personal::sortable()->where('nombre','LIKE',"%$query%")
        ->orWhere('apellidopaterno','LIKE',"%$query%")
        ->orWhere('apellidomaterno','LIKE',"%$query%")
        ->orWhere('razonsocial','LIKE',"%$query%")
        ->orWhere('rfc','LIKE',"%$query%")
        ->orWhere('mail','LIKE',"%$query%")
        ->paginate(10);
        } else {
            # code...
        if ($request->input('cli') == "true") {
            # code...
            $personals = Personal::sortable()->where('tipo','=','Cliente')
            ->where(function($busqueda) use($query){
                $busqueda->where('nombre','LIKE',"%$query%")
                ->orWhere('apellidopaterno','LIKE',"%$query%")
                ->orWhere('apellidomaterno','LIKE',"%$query%")
                ->orWhere('razonsocial','LIKE',"%$query%")
                ->orWhere('rfc','LIKE',"%$query%")
                ->orWhere('mail','LIKE',"%$query%");
            })->paginate(10);
        }
        elseif ($request->input('pro') == 'true') {
             # code...
            $personals = Personal::sortable()->where('tipo','=','Prospecto')
            ->where(function($busqueda) use($query){
                $busqueda->where('nombre','LIKE',"%$query%")
                ->orWhere('apellidopaterno','LIKE',"%$query%")
                ->orWhere('apellidomaterno','LIKE',"%$query%")
                ->orWhere('razonsocial','LIKE',"%$query%")
                ->orWhere('rfc','LIKE',"%$query%")
                ->orWhere('mail','LIKE',"%$query%");
            })->paginate(10);
         } 
        }
        
        
                // $personals = Personal::search($query)->get();
        
        // dd($personals);
        return view('personal.busqueda',['personals'=>$personals]);
        //Base de datos$message = Message::with('user')->where('content', 'LIKE', "%$query%")->get();
        //motor de busquedas
        // $message = Message::search($query)->get();
        // $message->load('user');
        // return view('messages.index', [
        //     'messages' => $message
        //     ]);
    }
}
