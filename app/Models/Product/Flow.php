<?php

namespace App\Models\Product;

use App\Models\Product\FlowType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flow extends Model
{
    use HasFactory;

    protected $table = 'product_flow';
    protected $fillable = [
        'type_id',
        'date',
        'note',
        'quantity',
    ];

    public function type()
    {
        return $this->belongsTo(FlowType::class);
    }
}
