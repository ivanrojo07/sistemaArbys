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
        $personals = Personal::orderBy('id','DESC')->paginate(10);
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
}