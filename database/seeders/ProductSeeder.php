<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $productNames = [
            'Baju' => [
                'Kaos Polos', 'Kaos Oversize', 'Kaos Graphic', 'Kaos Sport', 'Kaos Vintage',
                'Kemeja Flanel', 'Kemeja Lengan Panjang', 'Kemeja Slim Fit', 'Kemeja Linen', 'Kemeja Batik',
                'Sweater Rajut', 'Sweater Hoodie', 'Cardigan Rajut', 'Crewneck Premium', 'T-Shirt Basic',
                'Kaos Raglan', 'T-Shirt Streetwear', 'Kaos Tie Dye', 'Kaos Distressed', 'Kaos Pocket',
                'Hoodie Premium', 'Hoodie Fleece', 'Hoodie Zipper', 'Hoodie Lightweight', 'Jersey Sport',
                'Kaos Outdoor', 'Kaos Travel', 'Kaos Compression', 'Kaos Dry Fit', 'Kaos Training'
            ],
            'Celana' => [
                'Celana Jeans Slim Fit', 'Celana Jeans Straight', 'Celana Chino', 'Celana Jogger',
                'Celana Cargo', 'Celana Kulot', 'Celana Pendek Jeans', 'Celana Pendek Chino', 'Celana Track',
                'Celana Training', 'Celana Sweatpants', 'Celana Hiking', 'Celana Outdoor', 'Celana Baggy',
                'Celana Wide Leg', 'Celana Kulot Linen', 'Celana Formal Slim Fit', 'Celana Suit Pants',
                'Celana Stretch', 'Celana Taktikal', 'Celana Army', 'Celana Loose Fit', 'Celana Travel',
                'Celana Anti Air', 'Celana Kasual Harian', 'Celana Sport', 'Celana Yoga', 'Celana Running',
                'Celana Polyester', 'Celana High Waist'
            ],
            'Jaket' => [
                'Jaket Bomber', 'Jaket Varsity', 'Jaket Denim', 'Jaket Kulit Premium', 'Jaket Parasut',
                'Jaket Waterproof', 'Jaket Windbreaker', 'Jaket Parka', 'Jaket Hoodie Tebal', 'Jaket Fleece',
                'Jaket Outdoor', 'Jaket Gunung', 'Jaket Touring', 'Jaket Tactical', 'Jaket Casual',
                'Jaket Harrington', 'Jaket Trucker', 'Jaket Lightweight', 'Jaket Softshell', 'Jaket Oversize',
                'Jaket Sweater Hoodie', 'Jaket Quilt', 'Jaket Bubble', 'Jaket Bomber Nylon', 'Jaket Varsity Fleece',
                'Jaket Raincoat', 'Jaket Urban Wear', 'Jaket Retro', 'Jaket Classic Fit', 'Jaket Premium Series'
            ],
        ];

        // Warna random
        $colors = ['Hitam', 'Putih', 'Abu-Abu', 'Biru', 'Merah', 'Hijau', 'Coklat', 'Cream', 'Navy', 'Maroon'];

        // Ukuran random
        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];

        $categories = Category::all();

        foreach ($categories as $category) {
            $names = $productNames[$category->name];

            foreach ($names as $name) {
                DB::table('products')->insert([
                    'name'        => $name,
                    'description' => "$name adalah produk kategori {$category->name} yang dibuat dengan bahan berkualitas tinggi, nyaman digunakan, dan cocok untuk berbagai aktivitas.",
                    'price'       => rand(50000, 300000),
                    'category_id' => $category->id,
                    'color'       => $colors[array_rand($colors)],
                    'size'        => $sizes[array_rand($sizes)],
                    'image_url'   => "https://picsum.photos/seed/" . rand(1, 9999) . "/600/600",
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }
    }
}
