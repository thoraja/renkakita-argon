<?php

namespace Database\Seeders;

use App\Models\Order\Status;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            ['name' => 'Waiting for Payment'],
            ['name' => 'Paid'],
            ['name' => 'On Delivery'],
            ['name' => 'Completed'],
            ['name' => 'Rejected'],
        ]);
    }
}
