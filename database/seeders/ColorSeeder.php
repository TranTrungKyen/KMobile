<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Danh sách các màu sắc mẫu
        $colors = [
            ['name' => 'Red'],
            ['name' => 'Blue'],
            ['name' => 'Green'],
            ['name' => 'Yellow'],
            ['name' => 'Purple'],
            ['name' => 'Orange'],
            ['name' => 'Pink'],
            ['name' => 'Brown'],
            ['name' => 'Black'],
            ['name' => 'White'],
            ['name' => 'Gray'],
            ['name' => 'Cyan'],
            ['name' => 'Magenta'],
            ['name' => 'Lime'],
            ['name' => 'Maroon'],
            ['name' => 'Olive'],
            ['name' => 'Navy'],
            ['name' => 'Teal'],
            ['name' => 'Silver'],
            ['name' => 'Gold'],
        ];

        DB::table('colors')->insert($colors);
    }
}
