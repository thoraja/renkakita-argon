<?php

namespace App\Models\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'product_category';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
