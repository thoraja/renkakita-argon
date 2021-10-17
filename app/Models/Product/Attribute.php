<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'product_attribute';
    public $incrementing = false;
    public $timestamps = false;
}
