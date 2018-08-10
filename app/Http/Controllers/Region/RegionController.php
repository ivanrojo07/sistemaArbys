<?php

namespace App\Http\Controllers\Region;

use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    public function index()
    {
        $regiones = Region::get();
        return view('region.index', ['regiones' => $regiones]);
    }

    public function estados(Region $region) {
        if($region->id !=0)
            return view('region.estados',['region' => $region]);
    }
}
