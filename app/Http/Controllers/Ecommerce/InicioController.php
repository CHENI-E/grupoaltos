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

class InicioController extends Controller
{
    public function index()
    {
        $aboutMe = AboutMe::where('id', 1)->first();
        $category = Category::where('estado', 1)->withCount('products')->get();
        $identity = Identity::where('id', 1)->first();
        $banners = Banner::where('tipo', 'inicio')->get();
        $customers = Customer::with('clientImages')->where('id', 1)->first();
        return view('ecommerce.inicio', compact('banners', 'identity', 'aboutMe', 'category', 'customers'));
    }
}
