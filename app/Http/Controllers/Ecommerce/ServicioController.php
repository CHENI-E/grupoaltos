<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Banner;

class ServicioController extends Controller
{
    
    public function index()
    {
        $servicios = Service::where('estado', 1)->paginate(8);
        $banners = Banner::where('tipo', 'servicios')->get();
        return view('ecommerce.servicio', compact('servicios', 'banners'));
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
