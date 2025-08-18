<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    
    public function index()
    {
        $blog = Blog::where('estado', 1)->get();
        $blogRecientes = Blog::where('estado', 1)
            ->take(4)
            ->get();
        return view('ecommerce.blog', compact('blog', 'blogRecientes'));
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
