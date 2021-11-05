<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'product_attribute';
    protected $fillable = [
        'name',
        'value',
    ];
    public $incrementing = false;
    public $timestamps = false;
}
