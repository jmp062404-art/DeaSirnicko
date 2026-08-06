<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        // Define mapping Item → Category
        $items = [
            'Smartphone'        => 'Electronics',
            'Laptop'            => 'Electronics',
            'Bluetooth Speaker' => 'Electronics',
            'Office Chair'      => 'Furniture',
            'Cookware Set'      => 'Kitchen',
            'Backpack'          => 'Accessories',
            'Wristwatch'        => 'Accessories',
            'Sunscreen Lotion'  => 'Beauty/Health',
            'Running Shoes'     => 'Sportswear',
            'Bicycle Helmet'    => 'Sports/Gear',
        ];

        // Pick random item
        $itemName = $this->faker->randomElement(array_keys($items));
        $categoryName = $items[$itemName];

        // Get category_id based on category name
        $category = Category::firstOrCreate(['name' => $categoryName]);

        return [
            'name'        => $itemName,
            'description' => $this->faker->randomElement([
                'High quality and durable product.',
                'Best choice for everyday use.',
                'Limited stock available, order now.',
                'Affordable and reliable option.',
                'Perfect gift for family and friends.',
                'Modern and elegant style.',
                'Lightweight and easy to use.',
                'Stylish and comfortable design.',
                'Tested and recommended by experts.',
                'Designed for long-lasting performance.',
            ]),
            'price'       => $this->faker->randomFloat(2, 5, 100),
            'category_id' => $category->id,
        ];
    }
}
