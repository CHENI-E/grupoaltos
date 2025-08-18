<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServicioController extends Controller
{
    public function index()
    {
        return view('admin.servicio.index');
    }

    public function create()
    {
        return view('admin.servicio.create');
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
                $ruta = base_path('../public_html/uploads/servicios');
            } else {
                // Local: guardar en el public del proyecto
                $ruta = public_path('uploads/servicios');
            }

            if ($request->hasFile('imagen_detalle')) {
                $imagenDetalle = $request->file('imagen_detalle');
                $nombreArchivoDetalle = time() . '_detalle_' . $imagenDetalle->getClientOriginalName();

                // Crear carpeta si no existe
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagenDetalle->move($ruta, $nombreArchivoDetalle);
                $imagenRutaDetalle = 'uploads/servicios/' . $nombreArchivoDetalle;
            }

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();

                // Crear carpeta si no existe
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagen->move($ruta, $nombreArchivo);
                $imagenRuta = 'uploads/servicios/' . $nombreArchivo;
            }
            Service::create([
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

    public function listService()
    {
        return response()->json(Service::all());
    }

    public function mostrar_registro(Request $request)
    {
        $servicio = Service::find($request->id);
        if ($servicio) {
            return response()->json($servicio);
        }
        return response()->json(['error' => 'Servicio no encontrado'], 404);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_servicio' => 'required|exists:services,id',
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
            $servicio = Service::findOrFail($request->id_servicio);
            $servicio->nombre = $request->nombre;
            $servicio->descripcion = $request->descripcion;
            $servicio->estado = $request->estado;

            if ($request->hasFile('imagen_detalle')) {

                if (env('PRODUCTION') == 1) {
                    $ruta = base_path('../public_html/uploads/servicios');
                    $oldFilePathDetalle = base_path('../public_html/' . $servicio->imagen_detalle);
                } else {
                    $ruta = public_path('uploads/servicios');
                    $oldFilePathDetalle = public_path($servicio->imagen_detalle);
                }

                if ($servicio->imagen_detalle && file_exists($oldFilePathDetalle)) {
                    unlink($oldFilePathDetalle);
                }

                $imagenDetalle = $request->file('imagen_detalle');
                $nombreArchivoDetalle = time() . '_detalle_' . $imagenDetalle->getClientOriginalName();

                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagenDetalle->move($ruta, $nombreArchivoDetalle);
                $servicio->imagen_detalle = 'uploads/servicios/' . $nombreArchivoDetalle;
            }else{
                $servicio->imagen_detalle = $request->imagen_defecto_detalle;
            }

            if ($request->hasFile('imagen')) {

                if (env('PRODUCTION') == 1) {
                    $ruta = base_path('../public_html/uploads/servicios');
                    $oldFilePath = base_path('../public_html/' . $servicio->imagen);
                } else {
                    $ruta = public_path('uploads/servicios');
                    $oldFilePath = public_path($servicio->imagen);
                }

                if ($servicio->imagen && file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }

                $imagen = $request->file('imagen');
                $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
                
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagen->move($ruta, $nombreArchivo);
                $servicio->imagen = 'uploads/servicios/' . $nombreArchivo;
            } else {
                $servicio->imagen = $request->imagen_defecto;
            }

            $servicio->save();

            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Servicio actualizado correctamente.']);
            }
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => ['error' => 'Error al actualizar el servicio: ' . $e->getMessage()]]);
            }
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el servicio: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $servicio = Service::findOrFail($id);
            if (env('PRODUCTION') == 1) {
                $filePath = base_path('../public_html/' . $servicio->imagen);
                $oldFilePathDetalle = base_path('../public_html/' . $servicio->imagen_detalle);
            } else {
                $filePath = public_path($servicio->imagen);
                $oldFilePathDetalle = public_path($servicio->imagen_detalle);
            }

            if ($servicio->imagen && file_exists($filePath)) {
                unlink($filePath);
            }

            if ($servicio->imagen_detalle && file_exists($oldFilePathDetalle)) {
                unlink($oldFilePathDetalle);
            }

            $servicio->delete();
            return response()->json([
                'success' => true,
                'message' => 'Servicio eliminado correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => 'Error al eliminar el servicio: ' . $e->getMessage()
            ]);
        }
    }

}
