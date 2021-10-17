<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'order_detail';
    public $incrementing = false;
    public $timestamps = false;
}
