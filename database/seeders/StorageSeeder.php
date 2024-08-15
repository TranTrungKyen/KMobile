<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('storages')->insert([
            ['storage' => 'none'],
            ['storage' => '8GB'],
            ['storage' => '16GB'],
            ['storage' => '64GB'],
            ['storage' => '128GB'],
            ['storage' => '256GB'],
            ['storage' => '512GB'],
        ]);
    }
}
