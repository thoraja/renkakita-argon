<?php

namespace App\Http\Controllers\Order;

use Alert;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->cart->load('items', 'items.photos');
        $data = [
            'cart' => $cart,
        ];
        return view('order.cart.index', $data);
    }
    public function add(Product $product, Request $request)
    {
        Auth::user()->cart->add($product, $request->quantity);
        Alert::success('Added to Cart', 'Product has been successfully added to your cart');
        return back();
    }

    public function remove(Product $product)
    {
        Auth::user()->cart->remove($product);
        return back();
    }

    public function checkout(Request $request)
    {
        $cart = Auth::user()->cart;
        foreach ($request->quantity as $product_id => $quantity) {
            $cart->setQuantity(Product::find($product_id), $quantity);
        }
        return redirect()->route('order.order.show_confirmation');
    }
}
