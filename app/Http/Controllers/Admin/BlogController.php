<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploadHelper;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;

class BlogController extends Controller
{

    use FileUploadHelper;   

    public function index()
    {
        return view('admin.blog.index');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:250|unique:products,nombre',
            'autor' => 'nullable|string',
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
            'estado' => 'required|boolean',

            'imagen_portada' => 'required|image|mimes:jpg,jpeg,png|max:1072',
            'imagen_detalle_one' => 'nullable|image|mimes:jpg,jpeg,png|max:1072',
            'imagen_detalle_two' => 'nullable|image|mimes:jpg,jpeg,png|max:1072',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // 📌 Detectar ruta según entorno
            if (env('PRODUCTION') == 1) {
                // Producción: guardar en public_html
                $uploadPath = base_path('../public_html/uploads/blog/');
            } else {
                // Local: guardar en public del proyecto
                $uploadPath = public_path('uploads/blog/');
            }

            if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

            $nombrePortada = $this->guardarArchivo($request->file('imagen_portada'), $uploadPath, 'portada_');
            $imagenesDetalle = $this->procesarImagenesDetalleBlog($request, $uploadPath);

            $item = new Blog([
                'nombre' => $request->nombre,
                'autor' => $request->autor,
                'fecha' => $request->fecha,
                'contenido' => $request->descripcion,
                'estado' => $request->estado,
                'imagen_portada' => 'uploads/blog/' . $nombrePortada,
                'imagen_detalle_one' => $imagenesDetalle['one'] ?? null,
                'imagen_detalle_two' => $imagenesDetalle['two'] ?? null
            ]);

            $item->save();

            return response()->json([
                'status' => 200,
                'message' => 'Blog creado exitosamente',
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

    public function listBlog()
    {
        $blogs = Blog::all();
        return response()->json($blogs);
    }

    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            if (env('PRODUCTION') == 1) {
                $filePath = base_path('../public_html/' . $blog->imagen_portada);
                $filePathImagenDetalleOne = base_path('../public_html/' . $blog->imagen_detalle_one);
                $filePathImagenDetalleTwo = base_path('../public_html/' . $blog->imagen_detalle_two);
            } else {
                $filePath = public_path($blog->imagen_portada);
                $filePathImagenDetalleOne = public_path($blog->imagen_detalle_one);
                $filePathImagenDetalleTwo = public_path($blog->imagen_detalle_two);
            }

            if ($blog->imagen_portada && file_exists($filePath)) {
                unlink($filePath);
            }
            if ($blog->imagen_detalle_one && file_exists($filePathImagenDetalleOne)) {
                unlink($filePathImagenDetalleOne);
            }
            if ($blog->imagen_detalle_two && file_exists($filePathImagenDetalleTwo)) {
                unlink($filePathImagenDetalleTwo);
            }
            
            $blog->delete();
            return response()->json([
                'success' => true,
                'message' => 'Blog eliminado correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => 'Error al eliminar el blog: ' . $e->getMessage()
            ]);
        }
    }


}
