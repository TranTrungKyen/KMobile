<?php

namespace Database\Seeders;

use App\Models\ProductSale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductSale::create([
            'product_id' => 1,
            'sale_id' => 1,
            'discount' => 15,
            'price' => 1200,
        ]);

        ProductSale::create([
            'product_id' => 2,
            'sale_id' => 2,
            'discount' => 10,
            'price' => 1300,
        ]);

        ProductSale::create([
            'product_id' => 3,
            'sale_id' => 3,
            'discount' => 20,
            'price' => 800,
        ]);
    }
}
