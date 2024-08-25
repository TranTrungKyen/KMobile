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
        $colors = [
            ['name' => 'Đen'],
            ['name' => 'Trắng'],
            ['name' => 'Xám'],
            ['name' => 'Bạc'],
            ['name' => 'Vàng'],
            ['name' => 'Xanh dương'],
            ['name' => 'Xanh lá'],
            ['name' => 'Đỏ'],
            ['name' => 'Hồng'],
            ['name' => 'Tím'],
            ['name' => 'Cam'],
            ['name' => 'Xanh lam'],
            ['name' => 'Xanh ngọc'],
            ['name' => 'Nâu'],
            ['name' => 'Vàng nhạt'],
        ];

        DB::table('colors')->insert($colors);
    }
}
