<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $table = 'distributor';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'area',
    ];
    protected $attributes = [
        'is_verified' => 0
    ];

    public function verify()
    {
        $this->is_verified = 1;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
