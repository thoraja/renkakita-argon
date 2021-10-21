<?php

namespace App\Models\Product;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
