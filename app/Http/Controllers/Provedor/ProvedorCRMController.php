<?php

namespace App\Http\Controllers\Provedor;

use App\Http\Controllers\Controller;
use App\Provedor;
use App\ProvedorCRM;
use Illuminate\Http\Request;

class ProvedorCRMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedore)
    {
        //
        
        $crms = $provedore->crm;
        // dd($crms);
        return view('crmprovedores.index',['provedore'=>$provedore, 'crms'=>$crms]);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $crm = ProvedorCRM::create($request->all());
        return redirect()->route('provedores.crm.index',['provedore'=>$provedore]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedore, $crm)
    {
        //
        $crm = ProvedorCRM::findOrFail($crm);
        return view('crmprovedores.view',['provedore'=>$provedore,'crm'=>$crm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedore)
    {
        //
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
