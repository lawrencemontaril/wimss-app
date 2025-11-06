<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Hei;
use App\Models\User;
use App\Models\Dean;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'username' => 'admin',
            'contact_number' => '09123456789',
            'sex' => "male",
            'password' => 'admin',
            'profile_id' => null,
            'profile_type' => null,
        ]);
    }
}
