<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public $timestamps = false;

    public function details()
    {
        return $this->hasMany(Detail::class);
    }
}
