<?php

namespace Database\Seeders;

use App\Models\Product\Category;
use App\Models\Product\Material;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Maldives Series'],
            ['name' => 'Daffodil Series'],
            ['name' => 'Versatile Ultrafine'],
        ]);
        Material::insert([
            ['name' => 'Voal Ultrafine Grade A'],
            ['name' => 'Ultimate Voile'],
        ]);
    }
}
