<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Danh sách các danh mục
        $categories = [
            ['name' => 'Smartphones'],
            ['name' => 'Tablets'],
            ['name' => 'Laptops'],
            ['name' => 'Accessories'],
            ['name' => 'Smartwatches'],
            ['name' => 'Headphones'],
            ['name' => 'Chargers & Cables'],
            ['name' => 'Phone Cases'],
            ['name' => 'Screen Protectors'],
            ['name' => 'Memory Cards'],
            ['name' => 'Power Banks'],
        ];

        // Insert danh mục vào bảng categories
        DB::table('categories')->insert($categories);
    }
}
