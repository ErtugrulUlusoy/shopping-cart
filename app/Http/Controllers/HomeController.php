<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $cart = (object) $request->session()->get('cart');
        $products = Product::all();
        return view('front.home', ['products' => $products, 'cart' => $cart]);
    }
}