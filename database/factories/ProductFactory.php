<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $this->faker->randomElement([
                'Pocari Sweat 500ml',
                'Fanta Strawberry 330ml',
                'Qtela Tempe 80g',
                'Taro Net 80g',
                'Silverqueen 33g',
                'Mie Sedaap Kari Spesial',
                'Kapal Api Special Mix 20g',
                'Kopiko Brown Coffee 180ml'
            ]),
            'capital_price' => $this->faker->numberBetween(2000, 15000),
            'selling_price' => function (array $attributes) {
                return $attributes['capital_price'] + $this->faker->numberBetween(500, 5000);
            },
            'stock' => $this->faker->numberBetween(10, 100),
            'image' => null
        ];
    }
}