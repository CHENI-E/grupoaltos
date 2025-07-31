<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;

class ItemController extends Controller
{

    public function index()
    {
        $categoria = Category::where('estado', 1)->get();
        return view('admin.producto.item.index', compact('categoria'));
    }

    public function create()
    {
        $categoria = Category::where('estado', 1)->get();
        return view('admin.producto.item.create', compact('categoria'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:30|unique:products,nombre',
            'categoria' => 'required|exists:categories,id',
            'precio' => 'required|numeric',
            'descuento' => 'nullable|numeric',
            'oferta' => 'nullable|numeric',
            'descripcion' => 'required|string',
            'estado' => 'required|boolean',

            'imagen_portada' => 'required|image|mimes:jpg,jpeg,png|max:3072',
            'imagen_detalle.*' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',

            'ficha_tecnica' => 'required|mimes:pdf|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $uploadPath = public_path('uploads/items/');
        $pdfPath = public_path('uploads/items/pdf/');

        if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);
        if (!file_exists($pdfPath)) mkdir($pdfPath, 0777, true);

        $imagenPortada = $request->file('imagen_portada');
        $nombrePortada = 'portada_' . round(microtime(true)) . '.' . $imagenPortada->getClientOriginalExtension();
        $imagenPortada->move($uploadPath, $nombrePortada);

        $imagenesDetalle = [];
        if ($request->hasFile('imagen_detalle')) {
            foreach ($request->file('imagen_detalle') as $detalle) {
                $nombreDetalle = 'detalle_' . uniqid() . '.' . $detalle->getClientOriginalExtension();
                $detalle->move($uploadPath, $nombreDetalle);
                $imagenesDetalle[] = 'uploads/items/' . $nombreDetalle;
            }
        }

        $ficha = $request->file('ficha_tecnica');
        $nombreFicha = 'ficha_' . round(microtime(true)) . '.' . $ficha->getClientOriginalExtension();
        $ficha->move($pdfPath, $nombreFicha);

        $item = new Product();
        $item->nombre = $request->nombre;
        $item->category_id = $request->categoria;
        $item->precio = $request->precio;
        $item->descuento = $request->descuento;
        $item->precio_oferta = $request->oferta;
        $item->descripcion = $request->descripcion;
        $item->estado = $request->estado;
        $item->imagen_portada = 'uploads/items/' . $nombrePortada;
        $item->imagen_one = json_encode($imagenesDetalle);
        $item->pdf_ficha_tecnica = 'uploads/items/pdf/' . $nombreFicha;
        $item->save();

        return response()->json([
            'status'  => 200,
            'message' => 'Artículo creado exitosamente',
            'item_id' => $item->id,
        ]);
    }

    public function listItems()
    {
        return response()->json(Product::with('category')->get());
    }

    public function mostrar_registro_item(Request $request)
    {
        $id = $request->id;
        $item = Product::findOrFail($id);
        return response()->json($item);
    }

}
