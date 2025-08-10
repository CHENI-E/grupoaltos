<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Traits\FileUploadHelper;

class ItemController extends Controller
{

    use FileUploadHelper;

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
            'imagen_detalle_one' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'imagen_detalle_two' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'imagen_detalle_tree' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'imagen_detalle_four' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',

            'ficha_tecnica' => 'required|mimes:pdf|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            /* $uploadPath = public_path('uploads/items/');
            $pdfPath = public_path('uploads/items/pdf/'); */
            // 📌 Detectar ruta según entorno
            if (env('PRODUCTION') == 1) {
                // Producción: guardar en public_html
                $uploadPath = base_path('../public_html/uploads/items/');
                $pdfPath = base_path('../public_html/uploads/items/pdf/');
            } else {
                // Local: guardar en public del proyecto
                $uploadPath = public_path('uploads/items/');
                $pdfPath = public_path('uploads/items/pdf/');
            }

            if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);
            if (!file_exists($pdfPath)) mkdir($pdfPath, 0777, true);

            $nombrePortada = $this->guardarArchivo($request->file('imagen_portada'), $uploadPath, 'portada_');
            $imagenesDetalle = $this->procesarImagenesDetalle($request, $uploadPath);
            $nombreFicha = $this->guardarArchivo($request->file('ficha_tecnica'), $pdfPath, 'ficha_');

            $item = new Product([
                'nombre' => $request->nombre,
                'category_id' => $request->categoria,
                'precio' => $request->precio,
                'descuento' => $request->descuento,
                'precio_oferta' => $request->oferta,
                'descripcion' => $request->descripcion,
                'estado' => $request->estado,
                'imagen_portada' => 'uploads/items/' . $nombrePortada,
                'imagen_one' => $imagenesDetalle['one'] ?? null,
                'imagen_two' => $imagenesDetalle['two'] ?? null,
                'imagen_three' => $imagenesDetalle['tree'] ?? null,
                'imagen_four' => $imagenesDetalle['four'] ?? null,
                'pdf_ficha_tecnica' => 'uploads/items/pdf/' . $nombreFicha,
            ]);

            $item->save();

            return response()->json([
                'status' => 200,
                'message' => 'Artículo creado exitosamente',
                'item_id' => $item->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error interno del servidor.',
                'error' => $e->getMessage(),
            ], 500);
        }
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

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_formulario' => 'required|exists:products,id',
            'nombre' => 'required|string|max:30|unique:products,nombre,' . $request->id_formulario,
            'categoria' => 'required|exists:categories,id',
            'precio' => 'required|numeric',
            'descuento' => 'nullable|numeric',
            'oferta' => 'nullable|numeric',
            'descripcion' => 'required|string',
            'estado' => 'required|boolean',

            // Archivos opcionales
            'imagen_portada' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'imagen_detalle_one' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'imagen_detalle_two' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'imagen_detalle_tree' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'imagen_detalle_four' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'ficha_tecnica' => 'nullable|file|mimes:pdf|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $item = Product::findOrFail($request->id_formulario);

            /* $uploadPath = public_path('uploads/items/');
            $pdfPath = public_path('uploads/items/pdf/'); */
            // 📌 Detectar ruta según entorno
            if (env('PRODUCTION') == 1) {
                // Producción: guardar en public_html
                $uploadPath = base_path('../public_html/uploads/items/');
                $pdfPath = base_path('../public_html/uploads/items/pdf/');
            } else {
                // Local: guardar en public del proyecto
                $uploadPath = public_path('uploads/items/');
                $pdfPath = public_path('uploads/items/pdf/');
            }

            if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);
            if (!file_exists($pdfPath)) mkdir($pdfPath, 0777, true);

            // Reemplazar imagen de portada
            if ($request->hasFile('imagen_portada')) {
                if ($item->imagen_portada && file_exists(public_path($item->imagen_portada))) {
                    unlink(public_path($item->imagen_portada));
                }

                $nombrePortada = $this->guardarArchivo($request->file('imagen_portada'), $uploadPath, 'portada_');
                $item->imagen_portada = 'uploads/items/' . $nombrePortada;
            }

            // Reemplazar imágenes de detalle
            $imagenesDetalle = $this->procesarImagenesDetalle($request, $uploadPath, $item);
            if (isset($imagenesDetalle['one']))  $item->imagen_one = $imagenesDetalle['one'];
            if (isset($imagenesDetalle['two']))  $item->imagen_two = $imagenesDetalle['two'];
            if (isset($imagenesDetalle['tree'])) $item->imagen_three = $imagenesDetalle['tree'];
            if (isset($imagenesDetalle['four'])) $item->imagen_four = $imagenesDetalle['four'];

            // Reemplazar ficha técnica (PDF)
            if ($request->hasFile('ficha_tecnica')) {
                if ($item->pdf_ficha_tecnica && file_exists(public_path($item->pdf_ficha_tecnica))) {
                    unlink(public_path($item->pdf_ficha_tecnica));
                }

                $nombreFicha = $this->guardarArchivo($request->file('ficha_tecnica'), $pdfPath, 'ficha_');
                $item->pdf_ficha_tecnica = 'uploads/items/pdf/' . $nombreFicha;
            }

            // Actualizar otros campos
            $item->nombre         = $request->nombre;
            $item->category_id    = $request->categoria;
            $item->precio         = $request->precio;
            $item->descuento      = $request->descuento;
            $item->precio_oferta  = $request->oferta;
            $item->descripcion    = $request->descripcion;
            $item->estado         = $request->estado;

            $item->save();

            return response()->json([
                'status' => 200,
                'message' => 'Artículo actualizado exitosamente',
                'item_id' => $item->id,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error interno del servidor.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $producto = Product::findOrFail($id);

            // Rutas base
            $basePath = public_path();
            
            // Eliminar imagen portada
            if ($producto->imagen_portada && file_exists($basePath . '/' . $producto->imagen_portada)) {
                unlink($basePath . '/' . $producto->imagen_portada);
            }

            // Eliminar imágenes detalle
            if ($producto->imagen_one && file_exists($basePath . '/' . $producto->imagen_one)) {
                unlink($basePath . '/' . $producto->imagen_one);
            }
            if ($producto->imagen_two && file_exists($basePath . '/' . $producto->imagen_two)) {
                unlink($basePath . '/' . $producto->imagen_two);
            }
            if ($producto->imagen_three && file_exists($basePath . '/' . $producto->imagen_three)) {
                unlink($basePath . '/' . $producto->imagen_three);
            }
            if ($producto->imagen_four && file_exists($basePath . '/' . $producto->imagen_four)) {
                unlink($basePath . '/' . $producto->imagen_four);
            }

            // Eliminar ficha técnica
            if ($producto->pdf_ficha_tecnica && file_exists($basePath . '/' . $producto->pdf_ficha_tecnica)) {
                unlink($basePath . '/' . $producto->pdf_ficha_tecnica);
            }

            // Finalmente, eliminar el producto de la base de datos
            $producto->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Producto eliminado exitosamente.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error al eliminar el producto.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


}
