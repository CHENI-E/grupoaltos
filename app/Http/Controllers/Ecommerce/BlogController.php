<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        return view('ecommerce.blog');
    }

}
