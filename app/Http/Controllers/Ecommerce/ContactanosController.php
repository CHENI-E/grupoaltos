<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactanosEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Models\Banner;

class ContactanosController extends Controller
{
    public function index()
    {
        $banners = Banner::where('tipo', 'contactanos')->get();
        return view('ecommerce.contactanos', compact('banners'));
    }

    public function emailContactanos(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        $cacheKey = "contact_email_send_count";
        $emailLimit = 3; 
        $cacheTime = 3 * 60 * 60;

        $sendCount = Cache::get($cacheKey, 0);

        if ($sendCount >= $emailLimit) {
            return redirect()->back()->withErrors(['email' => 'Has alcanzado el límite de envíos. Intenta nuevamente en 3 horas.']);
        }

        Cache::put($cacheKey, $sendCount + 1, $cacheTime);

        try {
            Mail::to('ventas@grupoaltos.com.pe')->send(new ContactanosEmail($data));
            return redirect()->back()->with('success', 'Se envió tu mensaje, gracias por contactarnos.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['email' => 'Hubo un error al enviar el correo. Intenta nuevamente.']);
        }
    }
}
