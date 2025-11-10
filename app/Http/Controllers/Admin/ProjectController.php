<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.project.index');
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:1048',
            'estado' => 'required|boolean',
            'imagen_detalle' => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        try {
            $imagenRuta = null;
            // 📌 Detectar si estamos en producción o local
            if (env('PRODUCTION') == 1) {
                // Producción: guardar en public_html
                $ruta = base_path('../public_html/uploads/proyectos');
            } else {
                // Local: guardar en el public del proyecto
                $ruta = public_path('uploads/proyectos');
            }

            if ($request->hasFile('imagen_detalle')) {
                $imagenDetalle = $request->file('imagen_detalle');
                $nombreArchivoDetalle = time() . '_detalle_' . $imagenDetalle->getClientOriginalName();

                // Crear carpeta si no existe
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagenDetalle->move($ruta, $nombreArchivoDetalle);
                $imagenRutaDetalle = 'uploads/proyectos/' . $nombreArchivoDetalle;
            }

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();

                // Crear carpeta si no existe
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagen->move($ruta, $nombreArchivo);
                $imagenRuta = 'uploads/proyectos/' . $nombreArchivo;
            }
            Project::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'imagen' => $imagenRuta,
                'estado' => $request->estado,
                'imagen_detalle' => $imagenRutaDetalle,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Artículo creado exitosamente'
            ]);
            /* return redirect()->route('admin.servicio.create')->with('success', 'Servicio creado exitosamente.'); */
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error interno del servidor.',
                'error' => $e->getMessage(),
            ], 500);
            /* return redirect()->back()->withErrors(['error' => 'Error al crear el servicio: ' . $e->getMessage()]); */
        }
    }

    public function listProyectos()
    {
        $proyectos = Project::all();
        return response()->json($proyectos); 
    }

    public function mostrar_proyecto(Request $request)
    {
        $proyecto = Project::find($request->id);
        if ($proyecto) {
            return response()->json($proyecto);
        }
        return response()->json(['error' => 'Proyecto no encontrado'], 404);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_servicio' => 'required|exists:projects,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'imagen_detalle' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'imagen_defecto' => 'required',
            'imagen_defecto_detalle' => 'required',
            'estado' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()]);
            }
        }

        try {
            $proyecto = Project::findOrFail($request->id_servicio);
            $proyecto->nombre = $request->nombre;
            $proyecto->descripcion = $request->descripcion;
            $proyecto->estado = $request->estado;

            if ($request->hasFile('imagen_detalle')) {

                if (env('PRODUCTION') == 1) {
                    $ruta = base_path('../public_html/uploads/proyectos');
                    $oldFilePathDetalle = base_path('../public_html/' . $proyecto->imagen_detalle);
                } else {
                    $ruta = public_path('uploads/proyectos');
                    $oldFilePathDetalle = public_path($proyecto->imagen_detalle);
                }

                if ($proyecto->imagen_detalle && file_exists($oldFilePathDetalle)) {
                    unlink($oldFilePathDetalle);
                }

                $imagenDetalle = $request->file('imagen_detalle');
                $nombreArchivoDetalle = time() . '_detalle_' . $imagenDetalle->getClientOriginalName();

                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagenDetalle->move($ruta, $nombreArchivoDetalle);
                $proyecto->imagen_detalle = 'uploads/proyectos/' . $nombreArchivoDetalle;
            }else{
                $proyecto->imagen_detalle = $request->imagen_defecto_detalle;
            }

            if ($request->hasFile('imagen')) {

                if (env('PRODUCTION') == 1) {
                    $ruta = base_path('../public_html/uploads/proyectos');
                    $oldFilePath = base_path('../public_html/' . $proyecto->imagen);
                } else {
                    $ruta = public_path('uploads/proyectos');
                    $oldFilePath = public_path($proyecto->imagen);
                }

                if ($proyecto->imagen && file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }

                $imagen = $request->file('imagen');
                $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
                
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagen->move($ruta, $nombreArchivo);
                $proyecto->imagen = 'uploads/proyectos/' . $nombreArchivo;
            } else {
                $proyecto->imagen = $request->imagen_defecto;
            }

            $proyecto->save();

            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Proyecto actualizado correctamente.']);
            }
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => ['error' => 'Error al actualizar el proyecto: ' . $e->getMessage()]]);
            }
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el proyecto: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $proyecto = Project::findOrFail($id);
            if (env('PRODUCTION') == 1) {
                $filePath = base_path('../public_html/' . $proyecto->imagen);
                $oldFilePathDetalle = base_path('../public_html/' . $proyecto->imagen_detalle);
            } else {
                $filePath = public_path($proyecto->imagen);
                $oldFilePathDetalle = public_path($proyecto->imagen_detalle);
            }

            if ($proyecto->imagen && file_exists($filePath)) {
                unlink($filePath);
            }

            if ($proyecto->imagen_detalle && file_exists($oldFilePathDetalle)) {
                unlink($oldFilePathDetalle);
            }

            $proyecto->delete();
            return response()->json([
                'success' => true,
                'message' => 'Proyecto eliminado correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => 'Error al eliminar el proyecto: ' . $e->getMessage()
            ]);
        }
    }
}
