<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Ambil user pertama sebagai pemilik produk
        $user = User::first();

        $products = [
            // Minuman
            [
                'name' => 'Aqua Botol 600ml',
                'capital_price' => 3000,
                'selling_price' => 5000,
                'stock' => 100,
                'image' => null
            ],
            [
                'name' => 'Teh Botol Sosro 500ml',
                'capital_price' => 3500,
                'selling_price' => 6000,
                'stock' => 80,
                'image' => null
            ],
            [
                'name' => 'Coca-Cola Kaleng 330ml',
                'capital_price' => 5000,
                'selling_price' => 8000,
                'stock' => 50,
                'image' => null
            ],
            
            // Makanan Ringan
            [
                'name' => 'Chitato Original 85g',
                'capital_price' => 7000,
                'selling_price' => 10000,
                'stock' => 60,
                'image' => null
            ],
            [
                'name' => 'Oreo Vanilla 137g',
                'capital_price' => 8000,
                'selling_price' => 12000,
                'stock' => 40,
                'image' => null
            ],
            
            // Mie Instan
            [
                'name' => 'Indomie Goreng',
                'capital_price' => 2500,
                'selling_price' => 3500,
                'stock' => 120,
                'image' => null
            ],
            [
                'name' => 'Mie Sedap Soto',
                'capital_price' => 2500,
                'selling_price' => 3500,
                'stock' => 90,
                'image' => null
            ],
            
            // Rokok
            [
                'name' => 'Marlboro Red',
                'capital_price' => 25000,
                'selling_price' => 30000,
                'stock' => 30,
                'image' => null
            ],
            
            // Bahan Pokok
            [
                'name' => 'Gulaku 1kg',
                'capital_price' => 12000,
                'selling_price' => 15000,
                'stock' => 25,
                'image' => null
            ]
        ];

        foreach ($products as $product) {
            Product::create([
                'user_id' => $user->id,
                ...$product
            ]);
        }
    }
}