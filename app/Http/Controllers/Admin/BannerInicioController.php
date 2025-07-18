<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerInicioController extends Controller
{
    
    public function index()
    {
        return view('admin.banner.inicio.index');
    }

    public function getData()
    {
        $data = Banner::where('tipo', 'inicio')->get();
        return response()->json($data);
    }

    public function create()
    {
        return view('admin.banner.inicio.create');
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'tipo' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contenido' => 'required|string',
            'fondo' => 'required|string|max:7',
            'texto_boton' => 'nullable|string|max:50',
            'url_boton' => 'nullable|url|max:255',
            'estado' => 'required|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $ruta = 'ecommerce/assets/web/banner_inicio';
            $file->move(public_path($ruta), $nombreImagen);
            $validate['imagen'] = $ruta . '/' . $nombreImagen;
        }

        Banner::create($validate);
        return redirect()->route('admin.bannerinicio.index')->with('success', 'Banner creado exitosamente.');
    }


    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner->imagen && file_exists(public_path($banner->imagen))) {
            unlink(public_path($banner->imagen));
        }
        $banner->delete();
        return response()->json(['success' => 'Banner eliminado exitosamente.']);
    }

}
