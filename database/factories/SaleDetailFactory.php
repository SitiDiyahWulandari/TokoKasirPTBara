<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleDetailFactory extends Factory
{
    public function definition()
{
    return [
        'sale_id' => Sale::factory(), // Tidak perlu karena sudah di-handle seeder
        'product_id' => Product::inRandomOrder()->first()->id,
        'quantity' => $this->faker->numberBetween(1, 10),
        'subtotal' => function (array $attributes) {
            $product = Product::find($attributes['product_id']);
            return $product->selling_price * $attributes['quantity'];
        }
    ];
 }
}