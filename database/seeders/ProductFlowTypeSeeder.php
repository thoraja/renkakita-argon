<?php

namespace Database\Seeders;

use App\Models\Product\FlowType;
use Illuminate\Database\Seeder;

class ProductFlowTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FlowType::insert([
            ['name' => 'Received'],
            ['name' => 'Rejected'],
            ['name' => 'Sold']
        ]);
    }
}
