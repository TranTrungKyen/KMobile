<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = [
            [
                'category_id' => 1,
                'brand_id' => 1,
                'name' => 'iPhone 14 Pro Max',
                'description' => 'Điện thoại cao cấp của Apple với nhiều tính năng mới.',
                'title' => 'iPhone 14 Pro Max 128GB',
            ],
            [
                'category_id' => 1,
                'brand_id' => 2,
                'name' => 'Samsung Galaxy S23 Ultra',
                'description' => 'Điện thoại Android hàng đầu của Samsung với camera chất lượng cao.',
                'title' => 'Samsung Galaxy S23 Ultra 256GB',
            ],
            [
                'category_id' => 1,
                'brand_id' => 3,
                'name' => 'Xiaomi 13 Pro',
                'description' => 'Điện thoại với giá thành hợp lý nhưng hiệu năng mạnh mẽ từ Xiaomi.',
                'title' => 'Xiaomi 13 Pro 256GB',
            ],
        ];

        // Lặp để tạo thêm các sản phẩm giả
        for ($i = 4; $i <= 20; $i++) {
            $products[] = [
                'category_id' => rand(1, 10),
                'brand_id' => rand(1, 9),
                'name' => 'Product ' . $i,
                'description' => 'Description for Product ' . $i,
                'title' => 'Title for Product ' . $i,
            ];
        }

        DB::table('products')->insert($products);
    }
}
