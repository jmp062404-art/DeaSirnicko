<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Furniture',
            'Kitchen',
            'Beauty & Health',
            'Sports & Gear',
            'Clothing',
            'Accessories',
            'Books',
            'Toys & Games',
            'Home Appliances',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
