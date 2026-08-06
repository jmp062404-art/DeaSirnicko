<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Multi-dimensional array (bulk insert)
        $files = [
            ["name" => "Eva", "email" => strtolower("Eva") . '@minsu.edu.ph'],
            ["name" => "Frank", "email" => strtolower("Frank") . '@minsu.edu.ph'],
            ["name" => "Grace", "email" => strtolower("Grace") . '@minsu.edu.ph'],
        ];
        DB::table('files')->insert($files);
    }
}
