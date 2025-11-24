<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identity;
use App\Models\Customer;
use App\Models\Banner;
use App\Models\ImagesValue;

class NosotrosController extends Controller
{
    public function index()
    {
        $identities = Identity::first();
        $customers = Customer::with('clientImages')->where('id', 1)->first();
        $banners = Banner::where('tipo', 'nosotros')->get();
        $imagesValues = ImagesValue::all();
        return view('ecommerce.nosotros', compact('identities', 'customers', 'banners', 'imagesValues'));
    }   
}
