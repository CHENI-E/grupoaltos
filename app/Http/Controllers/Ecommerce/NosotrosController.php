<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identity;
use App\Models\Customer;
use App\Models\Banner;
use App\Models\ImagesValue;
use App\Models\InformationPage;

class NosotrosController extends Controller
{
    public function index()
    {
        $identities = Identity::first();
        $customers = Customer::with('clientImages')->where('id', 1)->first();
        $banners = Banner::where('tipo', 'nosotros')->get();
        $imagesValues = ImagesValue::all();
        $valores = InformationPage::where('tipo', 'valores')
            ->whereNull('orden')
            ->first();
        $valores_items = InformationPage::where('tipo', 'valores')
            ->where('orden', 'iitems')
            ->orderBy('created_at', 'asc')
            ->get();
        return view('ecommerce.nosotros', compact('identities', 'customers', 'banners', 'imagesValues', 'valores', 'valores_items'));
    }   
}
