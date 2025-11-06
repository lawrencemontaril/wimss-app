<?php

namespace Database\Seeders;

use App\Models\Hei;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeiSeeder extends Seeder
{
    /*
    | -------------------------
    |  Run the database seeds.
    | -------------------------
    */
    public function run(): void
    {
        $heis = [
            [
                'name' => 'St. Jude College Dasmarinas Cavite Inc.',
                'address' => 'Carlos Trinidad Avenue'
            ],
            [
                'name' => 'De La Salle University - Dasmarinas',
                'address' => 'DBB-B, Congressional Avenue, Dasmariñas City, Cavite'
            ],
            [
                'name' => 'Kolehiyo ng Lungsod ng Dasmarinas',
                'address' => 'Brgy. Burol Main, Dasmarinas City, Cavite'
            ]
        ];

        Hei::insert($heis);
    }
}
