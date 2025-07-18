<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identity;
use App\Models\AboutMe;

class SeccionController extends Controller
{
    public function inicio()
    {
        $aboutMe = AboutMe::where('id', 1)->first();
        $identity = Identity::where('id', 1)->first();
        return view('admin.seccion.inicio.index', compact('identity', 'aboutMe'));
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
}
