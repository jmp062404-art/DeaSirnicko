<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobOrderSeeder extends Seeder
{
    public function run()
    {
        $jobOrders = [
            ["name" => "Eva", "email" => strtolower("Eva") . '@minnsu.edu.ph'],
            ["name" => "Frank", "email" => strtolower("Frank") . '@minnsu.edu.ph'],
            ["name" => "Grace", "email" => strtolower("Grace") . '@minnsu.edu.ph'],
        ];

        DB::table('job_orders')->insert($jobOrders); 
    }
}
