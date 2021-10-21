<?php

namespace Database\Seeders;

use App\Models\User\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'super_admin', 'display_name' => 'Super Admin'],
            ['name' => 'admin_general', 'display_name' => 'General Admin'],
            ['name' => 'admin_renka', 'display_name' => 'Renka Project\'s Admin'],
            ['name' => 'admin_kita', 'display_name' => 'Pakai Kita\'s Admin'],
            ['name' => 'distributor_renka', 'display_name' => 'Renka Project\'s Distributor'],
            ['name' => 'distributor_kita', 'display_name' => 'Pakai Kita\'s Distributor'],
            ['name' => 'user', 'display_name' => 'User'],
        ]);
    }
}
