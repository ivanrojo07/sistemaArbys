<?php

namespace App\Http\Controllers\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        Personal::create($request->all());
        if ($request['tipo'] == 'Cliente') {
            return redirect('personals');
        }
        if($request['tipo'] == 'Prospecto') {
            return redirect('personals');
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
        // dd($request);
        $personal->update($request->all());
        // Personal::where('id'=>$personal->id)->update($request->all());
        return redirect('/personals');
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
        $query = $request->input('query');
        // $personals = Personal::search($query)->get();
        $personals = Personal::sortable()->where('nombre','LIKE',"%$query%")
        ->orWhere('apellidopaterno','LIKE',"%$query%")
        ->orWhere('apellidomaterno','LIKE',"%$query%")
        ->orWhere('rfc','LIKE',"%$query%")
        ->orWhere('mail','LIKE',"%$query%")
        ->paginate(10);
        // dd($personals);
        return view('personal.index',['personals'=>$personals]);
        //Base de datos$message = Message::with('user')->where('content', 'LIKE', "%$query%")->get();
        //motor de busquedas
        // $message = Message::search($query)->get();
        // $message->load('user');
        // return view('messages.index', [
        //     'messages' => $message
        //     ]);
    }

    public function clientes(){
        $personals = Personal::sortable()->where('tipo','=','Cliente')->paginate(10);
        return view('personal.index',['personals'=>$personals]);
    }

    public function prospectos(){
        $personals = Personal::sortable()->where('tipo','=','Prospecto')->paginate(10);
        return view('personal.index',['personals'=>$personals]);
    }
}