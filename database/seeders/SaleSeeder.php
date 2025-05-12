<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\User;
use App\Models\Product;

class SaleSeeder extends Seeder
{
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'kasir@tokodiyah.com'
        ], [
            'name' => 'Kasir Toko',
            'shop_name' => 'Toko Diyah',
            'password' => Hash::make('password123')
        ]);

        // Buat 50 transaksi dengan 3-5 item per transaksi
        Sale::factory(50)
            ->for($user)
            ->has(
                SaleDetail::factory()
                    ->count(rand(3, 5))
                    ->state(function (array $attributes, Sale $sale) {
                        return [
                            'product_id' => Product::inRandomOrder()->first()->id,
                        ];
                    })
            )
            ->create();
    }
}
