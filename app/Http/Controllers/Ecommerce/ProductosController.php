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

    public function getProductosAjax(Request $request)
    {
        $limit = $request->input('limit', 20);
        $offset = $request->input('offset', 0);

        $nombre = $request->input('nombre');
        $categorias = $request->input('categorias', []);
        $minPrecio = $request->input('minPrecio');
        $maxPrecio = $request->input('maxPrecio');
        $minDescuento = $request->input('minDescuento');

        $query = Product::query();
        $query->where('estado', 1);

        if ($nombre) {
            $query->where('nombre', 'like', "%$nombre%");
        }

        if (!empty($categorias)) {
            $query->whereIn('category_id', $categorias);
        }

        if ($minPrecio !== null) {
            $query->where('precio', '>=', $minPrecio);
        }

        if ($maxPrecio !== null) {
            $query->where('precio', '<=', $maxPrecio);
        }

        if ($minDescuento !== null) {
            $query->where('descuento', '>=', $minDescuento);
        }

        $productos = $query->skip($offset)->take($limit)->get();

        return response()->json($productos);
    }

    public function detalle($slug)
    {
        $producto = Product::where('slug', $slug)->where('estado', 1)->with('category')->first();
        if (!$producto) {
            return redirect()->route('ecommerce.productos')->with('error_found_producto', 'El producto que buscas no está disponible.');
        }
        $productoSimilares = Product::where('category_id', $producto->category_id)
            ->where('estado', 1)
            ->where('id', '!=', $producto->id)
            ->take(4)
            ->get();
        return view('ecommerce.productoDetalle', compact('producto', 'productoSimilares'));
    }

}
