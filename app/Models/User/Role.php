<?php

namespace App\Models\User;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const SUPER_ADMIN = 1;
    const GENERAL_ADMIN = 2;
    const ADMINS = [1, 2, 3, 4];
    const DISTRIBUTORS = [5, 6];
    const DEFAULT = 7;

    protected $table = 'user_role';
    public $timestamps = false;

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
