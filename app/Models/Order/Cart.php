<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Expression;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
    ];

    public function items()
    {
        return $this->belongsToMany(Product::class, 'cart_item')->withPivot('quantity');
    }

    public function setQuantity(Product $product, $quantity)
    {
        if ($this->items->contains($product)) {
            $this->items()->updateExistingPivot($product, ['quantity' => $quantity]);
        } else {
            $this->items()->attach($product->id, ['quantity' => $quantity]);
        }
    }

    public function add(Product $product, $quantity)
    {
        if ($this->items->contains($product)) {
            $quantity += $this->items()->find($product)->pivot->quantity;
        }
        $this->setQuantity($product, $quantity);
    }

    public function remove(Product $product)
    {
        if ($this->items->contains($product)) {
            $this->items()->detach($product);
        }
    }

    public function clear()
    {
        $this->items()->detach();
    }
}
