<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'shop_name' => 'Toko ' . $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Password default
            'remember_token' => Str::random(10),
        ];
    }

    // State khusus untuk role owner
    public function owner()
    {
        return $this->state([
            'email' => 'owner@tokodiyah.com',
            'role' => 'owner',
        ]);
    }

    // State khusus untuk role kasir
    public function cashier()
    {
        return $this->state([
            'role' => 'cashier',
        ]);
    }
}