<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        // Predefined 25 unique products in plain English
        $products = [
            [
                'name' => 'Luxury Apartment',
                'description' => 'An elegant apartment featuring spacious interiors and premium facilities.',
                'city' => 'New York',
                'country' => 'USA',
                'year_listed' => 2023,
                'number_of_rooms' => 3,
            ],
            [
                'name' => 'Cozy Cottage',
                'description' => 'A charming countryside home surrounded by nature and fresh air.',
                'city' => 'Toronto',
                'country' => 'Canada',
                'year_listed' => 2022,
                'number_of_rooms' => 2,
            ],
            [
                'name' => 'Modern Condo',
                'description' => 'A contemporary condo with stylish design and convenient location.',
                'city' => 'Tokyo',
                'country' => 'Japan',
                'year_listed' => 2024,
                'number_of_rooms' => 2,
            ],
            [
                'name' => 'Family Villa',
                'description' => 'A spacious villa built for families, complete with a backyard and garage.',
                'city' => 'Berlin',
                'country' => 'Germany',
                'year_listed' => 2021,
                'number_of_rooms' => 4,
            ],
            [
                'name' => 'Beach House',
                'description' => 'A coastal property offering direct access to the sandy shoreline.',
                'city' => 'Sydney',
                'country' => 'Australia',
                'year_listed' => 2020,
                'number_of_rooms' => 3,
            ],
            [
                'name' => 'Penthouse Suite',
                'description' => 'A high-rise penthouse with a rooftop terrace and breathtaking views.',
                'city' => 'Los Angeles',
                'country' => 'USA',
                'year_listed' => 2025,
                'number_of_rooms' => 5,
            ],
            [
                'name' => 'Rustic Farmhouse',
                'description' => 'A traditional farmhouse with wooden interiors and wide open fields.',
                'city' => 'Quebec',
                'country' => 'Canada',
                'year_listed' => 2019,
                'number_of_rooms' => 3,
            ],
            [
                'name' => 'City Loft',
                'description' => 'A trendy loft with an open floor plan, ideal for urban living.',
                'city' => 'Chicago',
                'country' => 'USA',
                'year_listed' => 2021,
                'number_of_rooms' => 2,
            ],
            [
                'name' => 'Mountain Cabin',
                'description' => 'A wooden cabin surrounded by pine trees and mountain trails.',
                'city' => 'Vancouver',
                'country' => 'Canada',
                'year_listed' => 2022,
                'number_of_rooms' => 2,
            ],
            [
                'name' => 'Studio Apartment',
                'description' => 'A compact living space designed for convenience and affordability.',
                'city' => 'London',
                'country' => 'UK',
                'year_listed' => 2020,
                'number_of_rooms' => 1,
            ],
            [
                'name' => 'Seaside Bungalow',
                'description' => 'A bungalow close to the ocean, perfect for relaxation and holidays.',
                'city' => 'Gold Coast',
                'country' => 'Australia',
                'year_listed' => 2023,
                'number_of_rooms' => 2,
            ],
            [
                'name' => 'Historic Townhouse',
                'description' => 'A townhouse with preserved architecture combined with modern comforts.',
                'city' => 'Paris',
                'country' => 'France',
                'year_listed' => 2018,
                'number_of_rooms' => 3,
            ],
            [
                'name' => 'Garden Duplex',
                'description' => 'A two-level home with a private garden and green surroundings.',
                'city' => 'Rome',
                'country' => 'Italy',
                'year_listed' => 2022,
                'number_of_rooms' => 3,
            ],
            [
                'name' => 'Skyline Tower Unit',
                'description' => 'An apartment in a tall skyscraper offering full city skyline views.',
                'city' => 'Dubai',
                'country' => 'UAE',
                'year_listed' => 2024,
                'number_of_rooms' => 2,
            ],
            [
                'name' => 'Suburban House',
                'description' => 'A family house in a peaceful neighborhood with wide streets.',
                'city' => 'Houston',
                'country' => 'USA',
                'year_listed' => 2019,
                'number_of_rooms' => 4,
            ],
            [
                'name' => 'Countryside Manor',
                'description' => 'A luxurious manor offering spacious halls and scenic surroundings.',
                'city' => 'Dublin',
                'country' => 'Ireland',
                'year_listed' => 2021,
                'number_of_rooms' => 6,
            ],
            [
                'name' => 'Island Villa',
                'description' => 'A tropical villa with private pools and a relaxing island atmosphere.',
                'city' => 'Cebu',
                'country' => 'Philippines',
                'year_listed' => 2023,
                'number_of_rooms' => 4,
            ],
            [
                'name' => 'Downtown Studio',
                'description' => 'A compact studio located near entertainment and office hubs.',
                'city' => 'Seoul',
                'country' => 'South Korea',
                'year_listed' => 2020,
                'number_of_rooms' => 1,
            ],
            [
                'name' => 'Lakefront House',
                'description' => 'A house directly beside a lake, perfect for quiet and relaxation.',
                'city' => 'Zurich',
                'country' => 'Switzerland',
                'year_listed' => 2021,
                'number_of_rooms' => 3,
            ],
            [
                'name' => 'Modern Townhome',
                'description' => 'A sleek townhome designed with contemporary interiors and finishes.',
                'city' => 'Madrid',
                'country' => 'Spain',
                'year_listed' => 2022,
                'number_of_rooms' => 3,
            ],
            [
                'name' => 'Cliffside Retreat',
                'description' => 'A getaway house built along cliffs, offering dramatic ocean views.',
                'city' => 'Santorini',
                'country' => 'Greece',
                'year_listed' => 2023,
                'number_of_rooms' => 2,
            ],
            [
                'name' => 'Eco-Friendly Home',
                'description' => 'A residence constructed with renewable energy and sustainable materials.',
                'city' => 'Stockholm',
                'country' => 'Sweden',
                'year_listed' => 2024,
                'number_of_rooms' => 3,
            ],
            [
                'name' => 'Desert Villa',
                'description' => 'A villa built in a desert environment with innovative cooling systems.',
                'city' => 'Riyadh',
                'country' => 'Saudi Arabia',
                'year_listed' => 2021,
                'number_of_rooms' => 5,
            ],
            [
                'name' => 'Ski Lodge',
                'description' => 'A mountain lodge located near ski resorts, ideal for winter stays.',
                'city' => 'Aspen',
                'country' => 'USA',
                'year_listed' => 2020,
                'number_of_rooms' => 4,
            ],
        ];

        // Randomly pick one predefined product
        return $products[array_rand($products)];
    }
}
