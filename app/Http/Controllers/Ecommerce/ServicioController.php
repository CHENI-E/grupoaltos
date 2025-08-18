<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServicioController extends Controller
{
    
    public function index()
    {
        $servicios = Service::where('estado', 1)->get();
        return view('ecommerce.servicio', compact('servicios'));
    }
    
    public function viewdetalle($slug)
    {
        $servicio = Service::where('slug', $slug)->where('estado', 1)->firstOrFail();
        $serviciosSimilares = Service::select('id', 'nombre', 'slug')
            ->where('estado', 1)
            ->where('id', '!=', $servicio->id)
            ->get();

        return view('ecommerce.servicioDetalle', compact('servicio', 'serviciosSimilares'));
    }

}
