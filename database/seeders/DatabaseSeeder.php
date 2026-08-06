<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product; // ✅ Import Product model

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ItemSeeder::class,
            ProductSeeder::class, // Added ProductSeeder
            UserSeeder::class,
        ]);
    }
}
