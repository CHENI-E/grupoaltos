<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductosController extends Controller
{
    public function index()
    {
        $category = Category::where('estado', 1)->withCount('products')->get();
        $product = Product::where('estado', 1)->get();
        return view('ecommerce.productos', compact('category', 'product'));
    }
}
