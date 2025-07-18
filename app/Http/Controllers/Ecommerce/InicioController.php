<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Identity;
Use App\Models\AboutMe;

class InicioController extends Controller
{
    public function index()
    {
        $aboutMe = AboutMe::where('id', 1)->first();
        
        $identity = Identity::where('id', 1)->first();
        $banners = Banner::where('tipo', 'inicio')->get();
        return view('ecommerce.inicio', compact('banners', 'identity', 'aboutMe'));
    }
}
