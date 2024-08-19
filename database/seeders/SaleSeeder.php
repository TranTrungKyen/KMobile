<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sales = [];

        for ($i = 1; $i <= 10; $i++) {
            $sales[] = [
                'start_at' => Carbon::now()->subDays(rand(0, 30)), 
                'end_at' => Carbon::now()->addDays(rand(1, 30)),
                'description' => 'Giảm giá đợt ' . $i, 
            ];
        }

        DB::table('sales')->insert($sales);
    }
}
