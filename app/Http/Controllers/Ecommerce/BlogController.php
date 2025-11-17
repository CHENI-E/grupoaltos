<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Banner;

class BlogController extends Controller
{
    
    /* public function index()
    {
        $blog = Blog::where('estado', 1)->get();
        $banners = Banner::where('tipo', 'blog')->get();
        $blogRecientes = Blog::where('estado', 1)
            ->take(4)
            ->get();
        return view('ecommerce.blog', compact('blog', 'blogRecientes', 'banners'));
    } */

    public function index(Request $request)
    {
        $query = Blog::where('estado', 1);

        // Si viene búsqueda
        if ($request->filled('buscar')) {
            $buscar = $request->buscar;

            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'LIKE', "%{$buscar}%")
                ->orWhere('contenido', 'LIKE', "%{$buscar}%")
                ->orWhere('autor', 'LIKE', "%{$buscar}%");
            });
        }

        $blog = $query->get();

        $banners = Banner::where('tipo', 'blog')->get();

        $blogRecientes = Blog::where('estado', 1)
            ->latest()
            ->take(4)
            ->get();

        return view('ecommerce.blog', compact('blog', 'blogRecientes', 'banners'));
    }


    public function detalle($slug)
    {
        $blog = Blog::where('slug', $slug)->where('estado', 1)->firstOrFail();
        $blogRecientes = Blog::where('estado', 1)
            ->where('id', '!=', $blog->id)
            ->take(4)
            ->get();
        return view('ecommerce.blogDetalle', compact('blog', 'blogRecientes'));
    }

}
