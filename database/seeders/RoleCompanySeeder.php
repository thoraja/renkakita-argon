<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('role_company')->insert([
            ['role_id' => 1, 'company_id' => 1],
            ['role_id' => 1, 'company_id' => 2],
            ['role_id' => 2, 'company_id' => 1],
            ['role_id' => 2, 'company_id' => 2],
            ['role_id' => 3, 'company_id' => 1],
            ['role_id' => 4, 'company_id' => 2],
            ['role_id' => 5, 'company_id' => 1],
            ['role_id' => 6, 'company_id' => 2],
        ]);
    }
}
