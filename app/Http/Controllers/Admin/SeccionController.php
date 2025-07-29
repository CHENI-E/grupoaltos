<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identity;
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
        $customer = Customer::with('clientImages')->where('id', 1)->first();
        $clientImages = $customer->clientImages;
        return view('admin.seccion.inicio.index', compact('identity', 'aboutMe', 'customer', 'clientImages'));
    }

    public function storeIdentities(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'subtitle' => 'string|max:255',
            'title_card_one' => 'string|max:255',
            'content_card_one' => 'string',
            'color_card_one' => 'nullable|string|max:7',
            'title_card_two' => 'string|max:255',
            'content_card_two' => 'string',
            'color_card_two' => 'nullable|string|max:7',
            'title_card_three' => 'string|max:255',
            'content_card_three' => 'string',
            'color_card_three' => 'nullable|string|max:7',
        ]);

        Identity::updateOrCreate(
            ['id' => 1],
            $validatedData
        );
        return redirect()->back()->with('success_identities', 'Se guardaron los cambios de la Seccion de Identidad.');
    }

    public function storeAboutMe(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'string|max:180',
            'content' => 'string',
            'image' => 'image|nullable',
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
