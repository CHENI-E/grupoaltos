<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NosotrosController extends Controller
{
    public function index()
    {
        return view('ecommerce.nosotros');
    }   
}
