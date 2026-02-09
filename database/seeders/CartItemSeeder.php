<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 30 cart items for customer (user_id = 3)
        for ($i = 1; $i <= 30; $i++) {
            $product = Product::inRandomOrder()->first();
            $quantity = rand(1, 5);

            CartItem::create([
                'customer_id' => 3, // Customer user
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
        }
    }
}
