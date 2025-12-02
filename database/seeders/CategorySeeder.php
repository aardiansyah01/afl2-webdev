<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Baju']);
        Category::create(['name' => 'Celana']);
        Category::create(['name' => 'Jaket']);
    }
}
