<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($productId, Request $request)
    {
        $product = Product::find($productId);
        $cart = (object) $request->session()->get('cart');

        return view('front.product', ['product' => $product, 'cart' => $cart]);
    }
}