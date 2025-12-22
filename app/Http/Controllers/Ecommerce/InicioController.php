<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Identity;
Use App\Models\AboutMe;
use App\Models\Category;
use App\Models\Customer;
use App\Models\ClientImage;
use App\Mail\EmpleabilidadEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\InformationPage;

class InicioController extends Controller
{
    public function index()
    {
        $aboutMe = AboutMe::where('id', 1)->first();
        $category = Category::where('estado', 1)->withCount('products')->get();
        $identity = Identity::where('id', 1)->first();
        $banners = Banner::where('tipo', 'inicio')->get();
        $customers = Customer::with('clientImages')->where('id', 1)->first();
        $iniciomapa = InformationPage::where('tipo', 'inicio_mapa')
            ->whereNull('orden')
            ->first();
        $iniciomapa_items = InformationPage::where('tipo', 'inicio_mapa')
            ->where('orden', 'items')
            ->orderBy('created_at', 'asc')
            ->get();
        return view('ecommerce.inicio', compact('banners', 'identity', 'aboutMe', 'category', 'customers', 'iniciomapa', 'iniciomapa_items'));
    }

    public function emailPostula(Request $request)
    {
        $key = 'postula:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 1)) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = ceil($seconds / 60);
            return redirect()->back()
                ->withErrors(['email' => "Ya enviaste el formulario. Por favor, vuelve a intentarlo en aproximadamente {$minutes} minutos."])
                ->withInput();
        }

        RateLimiter::hit($key, 10800);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $email = filter_var($request->input('email'), FILTER_SANITIZE_EMAIL);

        try {
            Mail::to($email)->send(new EmpleabilidadEmail());

            Log::info("Correo enviado a: $email desde IP: " . $request->ip());

            return redirect()->back()->with('success', 'Gracias por postularte! Revisa tu correo para más detalles.');

        } catch (\Exception $e) {
            Log::error("Error enviando correo a $email: " . $e->getMessage());

            return redirect()->back()
                ->withErrors(['email' => 'Hubo un problema enviando el correo. Por favor intenta más tarde.'])
                ->withInput();
        }
    }


}
