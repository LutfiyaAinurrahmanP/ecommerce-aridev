<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = ['bank_transfer', 'cod', 'e_wallet'];
        $statuses = ['pending', 'confirmed', 'shipped', 'delivered', 'cancelled'];

        $addresses = [
            'Jl. Merdeka No. 123, Jakarta Barat',
            'Jl. Sudirman No. 45, Jakarta Pusat',
            'Jl. Gatot Subroto No. 78, Jakarta Selatan',
            'Jl. Thamrin No. 21, Jakarta Pusat',
            'Jl. Asia Afrika No. 99, Bandung',
            'Jl. Malioboro No. 15, Yogyakarta',
            'Jl. Pemuda No. 67, Semarang',
            'Jl. Diponegoro No. 34, Surabaya',
        ];

        // Generate 30 orders
        for ($i = 1; $i <= 30; $i++) {
            $date = Carbon::now()->subDays(rand(1, 60));
            $orderId = 'ORD-' . $date->format('Ymd') . '-' . str_pad($i, 3, '0', STR_PAD_LEFT);

            // Random number of items per order (1-4 items)
            $itemCount = rand(1, 4);
            $totalAmount = 0;

            // Create order
            $order = Order::create([
                'id' => $orderId,
                'customer_id' => 3, // Customer user
                'total_amount' => 0, // Will update after calculating items
                'shipping_address' => $addresses[array_rand($addresses)],
                'shipping_phone' => '0812345678' . rand(10, 99),
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'status' => $statuses[array_rand($statuses)],
                'notes' => rand(0, 1) ? 'Tolong kirim pada jam kerja' : null,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            // Generate order items
            for ($j = 0; $j < $itemCount; $j++) {
                $product = Product::inRandomOrder()->first();
                $quantity = rand(1, 3);
                $subtotal = $product->price * $quantity;
                $totalAmount += $subtotal;

                OrderItem::create([
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'subtotal' => $subtotal,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }

            // Update order total amount
            $order->update(['total_amount' => $totalAmount]);
        }
    }
}
