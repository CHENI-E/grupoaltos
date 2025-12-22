<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformationPage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class InformationExtraController extends Controller
{
    /**
     * Directorio de imágenes según el entorno
     */
    private function getUploadPath()
    {
        if (env('PRODUCTION') == 1) {
            // Producción: guardar en public_html
            return base_path('../public_html/uploads/informationExtra/');
        } else {
            // Local: guardar en public del proyecto
            return public_path('uploads/informationExtra/');
        }
    }

    /**
     * Obtener la ruta completa del archivo según el entorno
     */
    private function getFullPath($relativePath)
    {
        if (env('PRODUCTION') == 1) {
            return base_path('../public_html/' . $relativePath);
        } else {
            return public_path($relativePath);
        }
    }

    /**
     * Guardar archivo en el servidor
     */
    private function guardarArchivo($file, $uploadPath, $prefix = 'img_')
    {
        if (!$file) return null;

        // Crear directorio si no existe
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true);
        }

        $extension = $file->getClientOriginalExtension();
        $nombreArchivo = $prefix . time() . '_' . Str::random(10) . '.' . $extension;
        $file->move($uploadPath, $nombreArchivo);

        return $nombreArchivo;
    }

    /**
     * Eliminar archivo antiguo
     */
    private function eliminarArchivo($relativePath)
    {
        if (!$relativePath) return;

        $fullPath = $this->getFullPath($relativePath);
        
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    /**
     * Mostrar listado de información extra
     */
    public function index()
    {
        // Obtener datos principales (títulos)
        $mainInfo = InformationPage::where('tipo', 'inicio_mapa')
            ->whereNull('orden')
            ->first();

        // Obtener items guardados (imágenes y títulos de cada item)
        $items = InformationPage::where('tipo', 'inicio_mapa')
            ->where('orden', 'items')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.informationExtra.index', compact('mainInfo', 'items'));
    }

    /**
     * Guardar o actualizar información del mapa de inicio
     */
    public function storeInicioMapa(Request $request)
    {
        try {
            Log::info('=== INICIO storeInicioMapa ===');
            Log::info('Tiene nuevos items: ' . ($request->has('items') ? 'SI' : 'NO'));
            Log::info('Items a eliminar: ' . ($request->has('delete_items') ? count($request->delete_items) : '0'));

            DB::beginTransaction();

            $tipo = 'inicio_mapa';
            $orden = 'items';
            $uploadPath = $this->getUploadPath();

            // 1. ELIMINAR ITEMS MARCADOS
            if ($request->has('delete_items') && is_array($request->delete_items)) {
                Log::info('Eliminando items marcados: ' . count($request->delete_items));
                
                foreach ($request->delete_items as $itemId) {
                    $item = InformationPage::find($itemId);
                    if ($item) {
                        // Eliminar archivo físico
                        $this->eliminarArchivo($item->imagen);
                        Log::info('Archivo eliminado: ' . $item->imagen);
                        
                        // Eliminar registro de BD
                        $item->delete();
                        Log::info('Registro eliminado ID: ' . $itemId);
                    }
                }
            }

            // 2. VALIDACIÓN
            $request->validate([
                'title_extra1' => 'nullable|string|max:255',
                'title2_extra1' => 'nullable|string|max:255',
                'items' => 'nullable|array',
                'items.*.title' => 'required_with:items|string|max:255',
                'items.*.image' => 'required_with:items|image|mimes:jpg,jpeg,png,webp|max:2048',
            ], [
                'items.*.title.required_with' => 'El título es obligatorio',
                'items.*.image.required_with' => 'La imagen es obligatoria',
                'items.*.image.image' => 'El archivo debe ser una imagen',
                'items.*.image.mimes' => 'Solo se permiten imágenes jpg, jpeg, png o webp',
                'items.*.image.max' => 'La imagen no debe superar 2MB',
            ]);

            Log::info('Validación exitosa');

            // 3. ACTUALIZAR O CREAR REGISTRO PRINCIPAL (títulos)
            $mainInfo = InformationPage::where('tipo', $tipo)
                ->whereNull('orden')
                ->first();

            if ($mainInfo) {
                $mainInfo->update([
                    'texto1' => $request->title_extra1,
                    'texto2' => $request->title2_extra1,
                ]);
                Log::info('Registro principal actualizado ID: ' . $mainInfo->id);
            } else {
                $mainInfo = InformationPage::create([
                    'tipo' => $tipo,
                    'texto1' => $request->title_extra1,
                    'texto2' => $request->title2_extra1,
                ]);
                Log::info('Registro principal creado ID: ' . $mainInfo->id);
            }

            // 4. AGREGAR NUEVOS ITEMS (sin eliminar los existentes)
            if ($request->has('items') && is_array($request->items)) {
                Log::info('Agregando nuevos items: ' . count($request->items));

                // Crear directorio si no existe
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true);
                    Log::info('Directorio creado: ' . $uploadPath);
                }

                $itemsGuardados = 0;
                foreach ($request->items as $index => $item) {
                    if (isset($item['image']) && isset($item['title'])) {
                        $nombreArchivo = $this->guardarArchivo(
                            $item['image'], 
                            $uploadPath, 
                            'inicio_mapa_'
                        );

                        if ($nombreArchivo) {
                            $nuevoItem = InformationPage::create([
                                'tipo' => $tipo,
                                'orden' => $orden,
                                'texto1' => $item['title'],
                                'imagen' => 'uploads/informationExtra/' . $nombreArchivo,
                            ]);
                            
                            Log::info("Item guardado - ID: {$nuevoItem->id}, Título: {$item['title']}");
                            $itemsGuardados++;
                        }
                    }
                }
                
                Log::info("Total de items guardados: {$itemsGuardados}");
            }

            DB::commit();
            Log::info('=== FIN storeInicioMapa EXITOSO ===');

            return back()->with('success', 'Datos guardados correctamente');

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('Error de validación: ' . json_encode($e->errors()));
            return back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Error de validación. Revisa los datos ingresados.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error en storeInicioMapa: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()
                ->withInput()
                ->with('error', 'Ocurrió un error al guardar los datos: ' . $e->getMessage());
        }
    }
}
