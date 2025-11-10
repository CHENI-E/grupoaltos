<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Project;

class ProyectosController extends Controller
{
    public function index()
    {
        $proyectos = Project::where('estado', 1)->get();
        $banners = Banner::where('tipo', 'proyectos')->get();
        return view('ecommerce.proyecto', compact('proyectos', 'banners'));
    }

    public function viewdetalle($slug)
    {
        $proyecto = Project::where('slug', $slug)->where('estado', 1)->firstOrFail();
        $proyectosSimilares = Project::select('id', 'nombre', 'slug')
            ->where('estado', 1)
            ->where('id', '!=', $proyecto->id)
            ->get();

        return view('ecommerce.proyectoDetalle', compact('proyecto', 'proyectosSimilares'));
    }

}
