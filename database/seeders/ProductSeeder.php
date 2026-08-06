<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // ✅ Import your Product model

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 25 products using the factory
        Product::factory()->count(25)->create();
    }
}
