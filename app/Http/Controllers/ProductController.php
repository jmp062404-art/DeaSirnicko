<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // A. Querying Tables

        // 1. Get all the columns from products table
        $allProducts = Product::all();

        // 2. Get the city column from the table
        $cities = Product::pluck('city'); // collection of cities (may contain duplicates)

        // 3. Get the city and year_listed columns from the table
        $cityYear = Product::select('city', 'year_listed')->get();

        // 4. Get the listing id and city, ordered by number_of_rooms ascending
        $idCityOrderedAsc = Product::select('id', 'city')->orderBy('number_of_rooms', 'asc')->get();

        // 5. Get the listing id and city, ordered by number_of_rooms descending
        $idCityOrderedDesc = Product::select('id', 'city')->orderBy('number_of_rooms', 'desc')->get();

        // 6. Get the first 5 rows from the products table
        $firstFive = Product::limit(5)->get();

        // 7. Get a unique list of cities where there are listings
        $uniqueCities = Product::select('city')->distinct()->pluck('city');

        // Example single value: the listing with the minimum number_of_rooms
        $minListing = Product::orderBy('number_of_rooms', 'asc')->first();

        // D. Grouping, Filtering, Sorting

        // 1. Total number of rooms for each country
        $roomsByCountry = Product::select('country', DB::raw('SUM(number_of_rooms) as total_rooms'))
            ->groupBy('country')
            ->get();

        // 2. Average number of rooms for each country
        $avgRoomsByCountry = Product::select('country', DB::raw('AVG(number_of_rooms) as avg_rooms'))
            ->groupBy('country')
            ->get();

        // 3. Max number of rooms per country
        $maxRoomsByCountry = Product::select('country', DB::raw('MAX(number_of_rooms) as max_rooms'))
            ->groupBy('country')
            ->get();

        // 4. Min number of rooms per country
        $minRoomsByCountry = Product::select('country', DB::raw('MIN(number_of_rooms) as min_rooms'))
            ->groupBy('country')
            ->get();

        // 5. Avg number of rooms per country, sorted ascending
        $avgRoomsSorted = Product::select('country', DB::raw('AVG(number_of_rooms) as avg_rooms'))
            ->groupBy('country')
            ->orderBy('avg_rooms', 'asc')
            ->get();

        // 6. Japan & USA average rooms per listing
        $japanUsaAvg = Product::select('country', DB::raw('AVG(number_of_rooms) as avg_rooms'))
            ->whereIn('country', ['Japan', 'USA'])
            ->groupBy('country')
            ->get();

        // 7. Number of distinct cities per country
        $citiesPerCountry = Product::select('country', DB::raw('COUNT(DISTINCT city) as city_count'))
            ->groupBy('country')
            ->get();

        // 8. Years where more than 100 listings
        $yearsWithMoreThan100 = Product::select('year_listed', DB::raw('COUNT(*) as total'))
            ->groupBy('year_listed')
            ->having('total', '>', 100)
            ->get();

        // Pack everything to pass to a view or return as JSON
        $data = compact(
            'allProducts',
            'cities',
            'cityYear',
            'idCityOrderedAsc',
            'idCityOrderedDesc',
            'firstFive',
            'uniqueCities',
            'minListing',
            'roomsByCountry',
            'avgRoomsByCountry',
            'maxRoomsByCountry',
            'minRoomsByCountry',
            'avgRoomsSorted',
            'japanUsaAvg',
            'citiesPerCountry',
            'yearsWithMoreThan100'
        );

        // return view('products.index', $data);
        return view('products.index', $data);
 // quick debug response
    }
}
