<?php

namespace App\Models\User;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'user_role';
    public $timestamps = false;

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'role_company', 'role_id', 'company_id');
    }
}
