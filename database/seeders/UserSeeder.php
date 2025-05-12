<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Diyah',
            'shop_name' => 'Toko Diyah',
            'email' => 'diyah@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create additional fake users if needed
        User::factory(5)->create();
    }
}