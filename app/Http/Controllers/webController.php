<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WebController extends Controller
{
   public function index()
    {
        $products = Product::paginate(8);
        return view('home', compact('products'));
    }
}
