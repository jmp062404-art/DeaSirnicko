<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\College;

class CollegeSeeder extends Seeder
{
    public function run(): void
    {
        // 3 Indexed Arrays
        $courses = ["BSIT", "BSCS", "BSECE"];
        $colleges = ["College of Computing", "College of Engineering", "College of Education"];
        $departments = ["IT Dept", "CS Dept", "ECE Dept"]; // just for example

        // 1 Associative Array
        $assocCollege = [
            "course" => "BSBA",
            "collegeName" => "College of Business Administration"
        ];

        // 7 Multidimensional Arrays
        $multiData = [
            ["course" => "BSHM", "collegeName" => "College of Hospitality Management"],
            ["course" => "BSA", "collegeName" => "College of Agriculture"],
            ["course" => "BSN", "collegeName" => "College of Nursing"],
            ["course" => "BSED", "collegeName" => "College of Education"],
            ["course" => "BSCE", "collegeName" => "College of Civil Engineering"],
            ["course" => "BSEE", "collegeName" => "College of Electrical Engineering"],
            ["course" => "BSME", "collegeName" => "College of Mechanical Engineering"],
        ];

        // Insert Indexed Arrays
        for ($i = 0; $i < count($courses); $i++) {
            College::create([
                'course' => $courses[$i],
                'collegeName' => $colleges[$i]
            ]);
        }

        // Insert Associative Array
        College::create($assocCollege);

        // Insert Multidimensional Arrays
        foreach ($multiData as $data) {
            College::create($data);
        }
    }
}
