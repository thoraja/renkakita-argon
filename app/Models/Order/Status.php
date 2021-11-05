<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const WAITING_FOR_PAYMENT = 1;
    const PAID = 2;
    const ON_DELIVERY = 3;
    const COMPLETED = 4;
    const REJECTED = 5;

    protected $table = 'order_status';
    public $timestamps = false;
}
