<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class BannerInicioController extends Controller
{
    
    public function index()
    {
        $banners = Banner::where('tipo', 'inicio')->get();
        return view('admin.banner.inicio.index', compact('banners'));
    }

    public function getData()
    {
        $data = Banner::all();
        return response()->json($data);
    }

    public function create()
    {
        return view('admin.banner.inicio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:255',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_movil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'nullable|url|max:255',
        ]);

        if (env('PRODUCTION') == 1) {
            /* $ruta = base_path('../public_html/uploads/categorias'); */
            $ruta = base_path('../public_html/ecommerce/assets/web/banner_cabezeras');
        } else {
            $ruta = public_path('ecommerce/assets/web/banner_cabezeras');
        }

        try {
            DB::beginTransaction();

            $bannerPath = null;
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $nombreImagen = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($ruta, $nombreImagen);
                $bannerPath = 'ecommerce/assets/web/banner_cabezeras' . '/' . $nombreImagen;
            }

            $bannerMovilPath = null;
            if ($request->hasFile('banner_movil')) {
                $file = $request->file('banner_movil');
                $nombreImagen = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($ruta, $nombreImagen);
                $bannerMovilPath = 'ecommerce/assets/web/banner_cabezeras' . '/' . $nombreImagen;
            }

            $banner = new Banner();
            $banner->tipo = $validated['tipo'];
            $banner->titulo = 'Banner de '.$validated['tipo'];
            $banner->imagen = $bannerPath;
            $banner->imagen_movil = $bannerMovilPath;
            $banner->url_boton = $validated['url'] ?? null;
            $banner->save();

            DB::commit();

            return redirect()
                ->route('admin.bannerinicio.index')
                ->with('success', 'Banner creado exitosamente.');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error al crear banner: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            return back()
                ->withInput()
                ->withErrors(['error' => 'Ocurrió un error al crear el banner. Inténtelo nuevamente.']);
        }
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);

        if (env('PRODUCTION') == 1) {
            $filePath = base_path('../public_html/' . $banner->imagen);
            $filePathMovil = base_path('../public_html/' . $banner->imagen_movil);
        } else {
            $filePath = public_path($banner->imagen);
            $filePathMovil = public_path($banner->imagen_movil);
        }

        if ($banner->imagen && $filePath) {
            unlink($filePath);
        }
        if ($banner->imagen_movil && $filePathMovil) {
            unlink($filePathMovil);
        }
        $banner->delete();
        return response()->json(['success' => 'Banner eliminado exitosamente.']);
    }

}
