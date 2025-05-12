<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'transaction_code' => 'TRX-' . now()->format('YmdHis') . '-' . Str::random(6),
            'total' => $this->faker->numberBetween(10000, 500000),
            'money_received' => function (array $attributes) {
                return $attributes['total'] + $this->faker->numberBetween(1000, 50000);
            },
            'change' => function (array $attributes) {
                return $attributes['money_received'] - $attributes['total'];
            },
        ];
    }
}