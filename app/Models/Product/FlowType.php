<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class FlowType extends Model
{
    const RECEIVED = 1;
    const REJECTED = 2;
    const SOLD = 3;
    protected $table = 'product_flow_type';
    public $timestamps = false;
}
