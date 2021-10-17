<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'product_photo';
    public $incrementing = false;
    public $timestamps = false;
}
