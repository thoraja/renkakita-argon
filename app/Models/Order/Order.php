<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'order_number',
        'date',
        'status_id',
        'notes',
    ];
    protected $attributes = [
        'status_id' => Status::WAITING_FOR_PAYMENT,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function details()
    {
        return $this->belongsToMany(Product::class, 'order_detail')->withPivot('quantity', 'price_each');
    }
}
