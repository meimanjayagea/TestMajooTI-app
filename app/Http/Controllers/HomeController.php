<?php

namespace App\Http\Controllers;

use App\Models\Pesanan_detail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Pesanan;

class HomeController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product = Product::get();
        $pesanandetail = Pesanan_detail::get();
        $pesanan = Pesanan::get();
        $user = User::where('level', 'USER')->get();

        return view('Admin/index', compact('product','pesanandetail','pesanan','user'));
 
    }
}
