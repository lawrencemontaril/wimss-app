<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /*
    | -------------------------
    |  Run the database seeds.
    | -------------------------
    */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Bachelor of Science in Computer Science',
                'code' => 'BSCS',
                'accreditation' => 'CMO_N25_S2015'
            ],
            [
                'name' => 'Bachelor of Science in Nursing',
                'code' => 'BSN',
                'accreditation' => 'CMO_N14_S2009'
            ],
            [
                'name' => 'Bachelor of Science in Radiologic Technology',
                'code' => 'BSRT',
                'accreditation' => 'CMO_N10_S2006'
            ],
            [
                'name' => 'Bachelor of Science in Psychology',
                'code' => 'BSP',
                'accreditation' => 'CMO_N34_S2017'
            ],
            [
                'name' => 'Bachelor of Science in Business Administration',
                'code' => 'BSBA',
                'accreditation' => 'CMO_N17_S2017'
            ],
            [
                'name' => 'Bachelor of Science in Accountancy',
                'code' => 'BSA',
                'accreditation' => 'CMO_N27_S2017'
            ],
            [
                'name' => 'Bachelor of Elementary Education',
                'code' => 'BEED',
                'accreditation' => 'CMO_N74_S2017'
            ],
            [
                'name' => 'Bachelor of Secondary Education (Major in English)',
                'code' => 'BSED-E',
                'accreditation' => 'CMO_N75_S2017'
            ],
            [
                'name' => 'Bachelor of Secondary Education (Major in Filipino)',
                'code' => 'BSED-F',
                'accreditation' => 'CMO_N75_S2017'
            ],
            [
                'name' => 'Bachelor of Science in Hospitality Management',
                'code' => 'BSHM',
                'accreditation' => 'CMO_N25_S2011'
            ],
        ];

        Course::insert($courses);
    }
}
