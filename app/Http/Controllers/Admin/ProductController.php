<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', ['products' => $products]);
    }

    public function create(Request $request)
    {
        return view('admin.products.create');
    }

    public function createPost(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'numeric',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        if ($product) {
            if ($request->hasfile('images')) {
                $productImages = array();
                foreach ($request->file('images') as $image) {
                    $name = $image->getClientOriginalName();
                    $image->move(public_path() . '/images/', $name);
                    $productImages[] = new ProductImage(['product_id' => $product->id, 'url' => '/images/' . $name]);
                }

                $product->images()->saveMany($productImages);
            }
        }
        return redirect('admin/products');
    }

    public function delete($id)
    {
        $find = Product::find($id);
        if ($find)
            Product::destroy($id);

        return redirect('admin/products');
    }
}