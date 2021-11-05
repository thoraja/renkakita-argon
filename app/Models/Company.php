<?php

namespace App\Models;

use App\Models\User\Role;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
