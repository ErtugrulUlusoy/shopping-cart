<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = (object) $request->session()->get('cart');
        return view('front.cart', ['cart' => $cart]);
    }

    public function addProductToCart(Request $request)
    {
        $product = Product::find($request->productId);
        $quantity = $request->quantity ?? 1;

        if (!$product)
            return json_encode(['status' => false, 'message' => 'Ürün bulunamadı']);

        if ($quantity < 1)
            return json_encode(['status' => false, 'message' => 'Sepete en az 1 adet ürün eklenebilir']);

        if (!$request->session()->exists('cart')) {
            $request->session()->put('cart', ['total' => 0, 'products' => []]);
        }


        $cartProducts = $request->session()->get('cart')['products'];
        $cartTotal = $request->session()->get('cart')['total'];

        $products = array();
        $productExistInCart = false;
        $total = 0;
        foreach ($cartProducts as $cartProduct) {
            if ($cartProduct['productId'] == $request->productId) {
                $products[] = array(
                    'productId' => $cartProduct['productId'],
                    'productName'   => $cartProduct['productName'],
                    'price'   => $cartProduct['price'],
                    'quantity'   => $quantity,
                    'amount'   => $cartProduct['price'] * $quantity,
                );

                $total += $product['price'] * $quantity;
                $productExistInCart = true;
            } else {
                $products[] = array(
                    'productId' => $cartProduct['productId'],
                    'productName'   => $cartProduct['productName'],
                    'price'   => $cartProduct['price'],
                    'quantity'   => $cartProduct['quantity'],
                    'amount'   => $cartProduct['price'] * $cartProduct['quantity']
                );
                $total += $cartProduct['price'] * $cartProduct['quantity'];
            }
        }
        $cartTotal = $total;

        if (!$productExistInCart) {
            array_push($products, array(
                'productId' => $product->id,
                'productName'   => $product->name,
                'price'   => $product->price,
                'quantity'   => $quantity,
                'amount'   => $product->price * $quantity
            ));
            $cartTotal += $product->price * $quantity;
        }
        $cart = array(
            'products' => $products,
            'total' => $cartTotal
        );

        $request->session()->put('cart', $cart);

        $response = array(
            'status'    => true,
            'message'   => 'Ürün sepetinize başarıyla eklendi/güncellendi',
            'data'      => $request->session()->get('cart')
        );

        return json_encode($response);
    }

    public function removeProductFromCart(Request $request)
    {
        $cartProducts = $request->session()->get('cart')['products'];
        $cartTotal = $request->session()->get('cart')['total'];
        $filteredArray = array_filter($cartProducts, function ($val) use ($request) {
            return ($val['productId'] == $request->productId);
        });
        if ($filteredArray) {
            unset($cartProducts[key($filteredArray)]);
            $request->session()->put('cart.products', $cartProducts);
            $amount = array_column($filteredArray, 'amount')[0];
            $cartTotal -= $amount;
            $request->session()->put('cart.total', round($cartTotal, 2));
            return json_encode(
                [
                    'status'  => true,
                    'message' => 'Ürün sepetinizden kaldırıldı',
                    'data'    => $request->session()->get('cart')
                ]
            );
        } else {
            return json_encode(
                [
                    'status'  => false,
                    'message' => 'Sepetinizde bu ürünü bulamadık'
                ]
            );
        }
    }
}