<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['Smartphone', 'High quality and durable smartphone with latest features.', 'Electronics', 499.99],
            ['Laptop', 'Lightweight laptop perfect for work and study.', 'Electronics', 899.99],
            ['Bluetooth Speaker', 'Portable speaker with clear sound and deep bass.', 'Electronics', 59.99],
            ['Smartwatch', 'Track your health and notifications on the go.', 'Electronics', 129.99],
            ['Tablet', 'Perfect balance of performance and portability.', 'Electronics', 299.99],

            ['Office Chair', 'Ergonomic design for comfort during long hours.', 'Furniture', 149.99],
            ['Study Desk', 'Spacious desk with modern minimalist style.', 'Furniture', 199.99],
            ['Bookshelf', 'Durable wooden bookshelf for storage.', 'Furniture', 89.99],
            ['Sofa Set', 'Comfortable sofa set for living room relaxation.', 'Furniture', 599.99],
            ['Coffee Table', 'Elegant table perfect for tea and gatherings.', 'Furniture', 79.99],

            ['Cookware Set', 'Complete cookware for everyday home cooking.', 'Kitchen', 39.99],
            ['Knife Set', 'Sharp and durable knife set for safe cooking.', 'Kitchen', 29.99],
            ['Rice Cooker', 'Automatic rice cooker with keep warm function.', 'Kitchen', 49.99],
            ['Blender', 'Powerful blender for smoothies and sauces.', 'Kitchen', 45.99],
            ['Dinnerware Set', 'Elegant dinnerware for family meals.', 'Kitchen', 59.99],

            ['Sunscreen Lotion', 'Protects skin against harmful UV rays.', 'Beauty & Health', 12.99],
            ['Shampoo', 'Gentle shampoo for soft and shiny hair.', 'Beauty & Health', 6.99],
            ['Skincare Cream', 'Moisturizing cream for daily use.', 'Beauty & Health', 18.99],
            ['Toothpaste Pack', 'Whitening toothpaste for fresh breath.', 'Beauty & Health', 5.99],
            ['Hair Dryer', 'Fast-drying hair dryer with heat control.', 'Beauty & Health', 29.99],

            ['Running Shoes', 'Lightweight shoes designed for comfort and speed.', 'Sports & Gear', 74.99],
            ['Bicycle Helmet', 'Safety helmet tested and approved by experts.', 'Sports & Gear', 45.99],
            ['Basketball', 'Durable basketball for indoor and outdoor play.', 'Sports & Gear', 29.99],
            ['Tennis Racket', 'Professional tennis racket for all levels.', 'Sports & Gear', 79.99],
            ['Dumbbell Set', 'Adjustable dumbbells for home workouts.', 'Sports & Gear', 99.99],

            ['T-Shirt', 'Casual cotton t-shirt available in all sizes.', 'Clothing', 14.99],
            ['Jeans', 'Durable denim jeans with classic fit.', 'Clothing', 39.99],
            ['Jacket', 'Warm jacket perfect for cold weather.', 'Clothing', 59.99],
            ['Sneakers', 'Trendy sneakers with cushioned comfort.', 'Clothing', 69.99],
            ['Dress', 'Elegant dress suitable for parties or events.', 'Clothing', 49.99],

            ['Wristwatch', 'Stylish wristwatch with modern design.', 'Accessories', 99.99],
            ['Sunglasses', 'UV-protected sunglasses for outdoor activities.', 'Accessories', 19.99],
            ['Backpack', 'Durable backpack with multiple compartments.', 'Accessories', 34.99],
            ['Wallet', 'Leather wallet with plenty of slots.', 'Accessories', 24.99],
            ['Necklace', 'Elegant necklace with timeless design.', 'Accessories', 44.99],

            ['Novel', 'Best-selling novel with engaging story.', 'Books', 9.99],
            ['Textbook', 'Educational textbook for students.', 'Books', 29.99],
            ['Comic Book', 'Colorful comic book with exciting storyline.', 'Books', 5.99],
            ['Dictionary', 'Comprehensive dictionary for daily use.', 'Books', 19.99],
            ['Magazine Set', 'Monthly magazine set for leisure reading.', 'Books', 14.99],

            ['Teddy Bear', 'Soft and cuddly teddy bear for kids.', 'Toys & Games', 19.99],
            ['Board Game', 'Fun board game for family and friends.', 'Toys & Games', 29.99],
            ['Puzzle Set', 'Challenging puzzle set to test your mind.', 'Toys & Games', 15.99],
            ['Toy Car', 'Mini toy car with realistic design.', 'Toys & Games', 12.99],
            ['Action Figure', 'Collectible action figure for kids and fans.', 'Toys & Games', 24.99],

            ['Washing Machine', 'Automatic washing machine with multiple modes.', 'Home Appliances', 399.99],
            ['Refrigerator', 'Energy-saving refrigerator with large capacity.', 'Home Appliances', 699.99],
            ['Microwave Oven', 'Compact microwave for fast heating.', 'Home Appliances', 149.99],
            ['Electric Fan', 'Powerful fan with adjustable speed.', 'Home Appliances', 49.99],
            ['Vacuum Cleaner', 'High suction vacuum cleaner for home use.', 'Home Appliances', 199.99],
        ];

        foreach ($items as [$name, $description, $categoryName, $price]) {
            $category = Category::where('name', $categoryName)->first();

            Item::create([
                'name' => $name,
                'description' => $description,
                'category_id' => $category->id,
                'price' => $price,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
