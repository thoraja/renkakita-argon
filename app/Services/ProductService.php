<?php

namespace App\Services;

use App\Models\Product\FlowType;
use App\Models\Product\Product;
use Carbon\Carbon;

class ProductService {
    public function handleStoreProduct($data)
    {
        $product = Product::create($data);
        if (isset($data['product_attributes'])) {
            $product->attributes()->createMany($data['product_attributes']);
        }
        if (isset($data['product_photos'])) {
            foreach ($data['product_photos'] as $index => $photo) {
                $product_photos[$index]['uri'] = $photo->store('images/product/'.$product->id);
            }
            $product->photos()->createMany($product_photos);
        }
        return $product;
    }

    public function handleStoreProductFlow(Product $product, $data)
    {
        $flows = [];
        $date = Carbon::parse($data['date']);
        $quantity_in_stock = $product->quantity_in_stock;
        $flows[] = [
            'type_id' => FlowType::RECEIVED,
            'date' => $date,
            'note' => $data['note'],
            'quantity' => $data['quantity'],
        ];
        $quantity_in_stock += $data['quantity'];
        if (isset($data['product_rejected'])) {
            foreach ($data['product_rejected'] as $rejected) {
                $flows[] = [
                    'type_id' => FlowType::REJECTED,
                    'date' => $date,
                    'note' => $rejected['note'],
                    'quantity' => -$rejected['quantity'],
                ];
                $quantity_in_stock -= $rejected['quantity'];
            }
        }
        $product->flows()->createMany($flows);

        $product->quantity_in_stock = $quantity_in_stock;
        $product->save();

        return $product;
    }
}
