<?php

namespace App\Http\Controllers\Product;

use Alert;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use App\Services\ProductService;

class StoreIncomingGoods extends Controller
{
    public function __invoke(Product $product, Request $request, ProductService $productService)
    {
        $productService->handleStoreProductFlow($product, $request->all());

        Alert::success();
        return redirect()->route('product.product.show', $product);
    }
}
