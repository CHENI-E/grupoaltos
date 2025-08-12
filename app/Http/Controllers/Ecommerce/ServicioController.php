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
    
}
