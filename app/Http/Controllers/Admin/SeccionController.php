<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identity;
use App\Models\ImagesValue;
use App\Models\AboutMe;
use App\Models\Customer;
use App\Models\ClientImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SeccionController extends Controller
{
    public function inicio()
    {
        $aboutMe = AboutMe::where('id', 1)->first();
        $identity = Identity::where('id', 1)->first();
        $imagesValue = ImagesValue::all(); // Obtener todas las imágenes
        $customer = Customer::with('clientImages')->where('id', 1)->first();
        $clientImages = $customer->clientImages;
        return view('admin.seccion.inicio.index', compact('identity', 'aboutMe', 'customer', 'clientImages', 'imagesValue'));
    }

    public function storeIdentities(Request $request)
    {
        try {
            // Log inicial para debugging
            Log::info('=== INICIO storeIdentities ===');
            Log::info('Tiene archivos: ' . ($request->hasFile('images') ? 'SI' : 'NO'));
            if ($request->hasFile('images')) {
                Log::info('Cantidad de archivos: ' . count($request->file('images')));
            }
            
            DB::beginTransaction();

            // Determinar la ruta base según entorno
            if (env('PRODUCTION') == 1) {
                // Producción: guardar en public_html
                $baseUploadPath = base_path('../public_html/uploads/imagen/Values/');
            } else {
                // Local: guardar en public del proyecto
                $baseUploadPath = public_path('uploads/imagen/Values/');
            }

            Log::info('Ruta de subida: ' . $baseUploadPath);

            // Eliminar imágenes si se enviaron IDs para eliminar
            if ($request->has('delete_images') && is_array($request->delete_images)) {
                Log::info('Imágenes a eliminar: ' . count($request->delete_images));
                foreach ($request->delete_images as $imageId) {
                    $image = ImagesValue::find($imageId);
                    if ($image) {
                        // Eliminar archivo físico
                        $filePath = $baseUploadPath . basename($image->images);
                        if (File::exists($filePath)) {
                            File::delete($filePath);
                            Log::info('Archivo eliminado: ' . $filePath);
                        }
                        // Eliminar registro de la base de datos (soft delete)
                        $image->delete();
                        Log::info('Registro eliminado ID: ' . $imageId);
                    }
                }
            }

            // Validación de datos
            $validated = $request->validate([
                'title' => 'nullable|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'title_card_one' => 'nullable|string|max:255',
                'content_card_one' => 'nullable|string',
                'color_card_one' => 'nullable|string|max:7',
                'title_card_two' => 'nullable|string|max:255',
                'content_card_two' => 'nullable|string',
                'color_card_two' => 'nullable|string|max:7',
                'title_card_three' => 'nullable|string|max:255',
                'content_card_three' => 'nullable|string',
                'color_card_three' => 'nullable|string|max:7',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // Max 5MB
            ]);

            Log::info('Validación exitosa');

            // Actualizar o crear el registro de Identity
            $identity = Identity::updateOrCreate(
                ['id' => 1],
                [
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'title_card_one' => $request->title_card_one,
                    'content_card_one' => $request->content_card_one,
                    'color_card_one' => $request->color_card_one,
                    'title_card_two' => $request->title_card_two,
                    'content_card_two' => $request->content_card_two,
                    'color_card_two' => $request->color_card_two,
                    'title_card_three' => $request->title_card_three,
                    'content_card_three' => $request->content_card_three,
                    'color_card_three' => $request->color_card_three,
                ]
            );

            Log::info('Identity actualizado ID: ' . $identity->id);

            // Subir nuevas imágenes
            if ($request->hasFile('images')) {
                Log::info('Procesando archivos de imágenes...');
                
                // Crear directorio si no existe
                if (!File::isDirectory($baseUploadPath)) {
                    File::makeDirectory($baseUploadPath, 0755, true);
                    Log::info('Directorio creado: ' . $baseUploadPath);
                }

                $uploadedCount = 0;
                foreach ($request->file('images') as $index => $image) {
                    if ($image->isValid()) {
                        // Generar nombre único para la imagen
                        $randomName = uniqid() . '_' . time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                        
                        Log::info("Procesando imagen {$index}: {$randomName}");
                        
                        // Mover imagen al directorio
                        $moved = $image->move($baseUploadPath, $randomName);
                        
                        if ($moved) {
                            // Crear registro en la base de datos usando el campo 'images'
                            $imageRecord = ImagesValue::create([
                                'images' => 'uploads/imagen/Values/' . $randomName
                            ]);
                            
                            Log::info("Imagen guardada - ID: {$imageRecord->id}, Path: {$imageRecord->images}");
                            $uploadedCount++;
                        } else {
                            Log::error("Error al mover imagen: {$randomName}");
                        }
                    } else {
                        Log::error("Archivo inválido en índice: {$index}");
                    }
                }
                
                Log::info("Total de imágenes subidas: {$uploadedCount}");
            } else {
                Log::info('No se recibieron archivos para subir');
            }

            DB::commit();
            Log::info('=== FIN storeIdentities EXITOSO ===');
            
            return redirect()->back()->with('success_identities', 'Se guardaron los cambios de la Sección de Identidad correctamente.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('Error de validación: ' . json_encode($e->errors()));
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error_identities', 'Error de validación. Revisa los datos ingresados.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al guardar identidades: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                ->withInput()
                ->with('error_identities', 'Ocurrió un error al guardar los datos. Intenta nuevamente. Error: ' . $e->getMessage());
        }
    }

    public function storeAboutMe(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'string|max:180',
            'content' => 'string',
            'image' => 'string|nullable',
            'boton_text' => 'string|max:100|nullable',
            'boton_link' => 'string|max:255|nullable',
        ]);

        AboutMe::updateOrCreate(
            ['id' => 1],
            $validatedData
        );

        return redirect()->back()->with('success_about_me', 'Se guardaron los cambios de la Seccion Sobre Mi.');
    }   

    public function storeClientes(Request $request)
    {
        try {
            DB::beginTransaction();

            // Determinar la ruta base según entorno
            if (env('PRODUCTION') == 1) {
                // Producción: guardar en public_html
                $baseUploadPath = base_path('../public_html/uploads/clientes/');
            } else {
                // Local: guardar en public del proyecto
                $baseUploadPath = public_path('uploads/clientes/');
            }

            // Eliminar imágenes si se enviaron IDs
            if ($request->has('delete_images')) {
                foreach ($request->delete_images as $id) {
                    $image = ClientImage::find($id);
                    if ($image) {
                        $filePath = $baseUploadPath . basename($image->image_path);
                        if (File::exists($filePath)) {
                            File::delete($filePath);
                        }
                        $image->delete();
                    }
                }
            }

            // Validación de datos
            $request->validate([
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'title_two' => 'string|max:150',
                'subtitle_two' => 'string|max:255'
            ]);

            // Actualizar o crear el registro del cliente
            Customer::updateOrCreate(
                ['id' => 1],
                [
                    'titulo' => $request->title_two,
                    'subtitulo' => $request->subtitle_two
                ]
            );

            // Subir nuevas imágenes
            if ($request->hasFile('images')) {
                if (!File::isDirectory($baseUploadPath)) {
                    File::makeDirectory($baseUploadPath, 0755, true);
                }

                foreach ($request->file('images') as $image) {
                    $randomName = uniqid() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                    $image->move($baseUploadPath, $randomName);

                    ClientImage::create([
                        'customer_id' => 1,
                        'image_path' => 'uploads/clientes/' . $randomName
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success_clients', 'Se guardaron los cambios de la Sección Clientes.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al guardar clientes: ' . $e->getMessage());
            return redirect()->back()->with('error_clients', 'Ocurrió un error al guardar los datos. Intenta nuevamente.');
        }
    }


    public function storeClientes_backup(Request $request)
    {
        try {
            DB::beginTransaction();
            if ($request->has('delete_images')) {
                foreach ($request->delete_images as $id) {
                    $image = ClientImage::find($id);
                    if ($image) {
                        $filePath = public_path($image->image_path);
                        if (File::exists($filePath)) {
                            File::delete($filePath);
                        }
                        $image->delete();
                    }
                }
            }
            $request->validate([
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'title_two' => 'string|max:150',
                'subtitle_two' => 'string|max:255'
            ]);
            Customer::updateOrCreate(
                ['id' => 1],
                [
                    'titulo' => $request->title_two,
                    'subtitulo' => $request->subtitle_two
                ]
            );
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $randomName = uniqid() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('ecommerce/assets/web/clientes');
                    if (!File::isDirectory($destinationPath)) {
                        File::makeDirectory($destinationPath, 0755, true);
                    }
                    $image->move($destinationPath, $randomName);
                    ClientImage::create([
                        'customer_id' => 1,
                        'image_path' => 'ecommerce/assets/web/clientes/' . $randomName
                    ]);
                }
            }
            DB::commit();
            return redirect()->back()->with('success_clients', 'Se guardaron los cambios de la Sección Clientes.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al guardar clientes: ' . $e->getMessage());
            return redirect()->back()->with('error_clients', 'Ocurrió un error al guardar los datos. Intenta nuevamente.');
        }
    }

}
