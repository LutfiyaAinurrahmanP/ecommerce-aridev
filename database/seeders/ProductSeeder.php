<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Electronics
            ['name' => 'iPhone 15 Pro', 'description' => 'Latest iPhone with advanced features and A17 Pro chip', 'price' => 15000000, 'stock' => 50, 'category_id' => 1, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Samsung Galaxy S24', 'description' => 'Flagship Samsung smartphone with Galaxy AI', 'price' => 12000000, 'stock' => 45, 'category_id' => 1, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Sony WH-1000XM5', 'description' => 'Premium noise-cancelling wireless headphones', 'price' => 5500000, 'stock' => 30, 'category_id' => 1, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'iPad Pro 12.9"', 'description' => 'Powerful tablet with M2 chip and Liquid Retina display', 'price' => 18000000, 'stock' => 25, 'category_id' => 1, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Apple Watch Series 9', 'description' => 'Advanced smartwatch with health monitoring', 'price' => 6500000, 'stock' => 40, 'category_id' => 1, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],

            // Fashion
            ['name' => 'Nike Air Jordan 1', 'description' => 'Classic basketball sneakers with iconic design', 'price' => 2500000, 'stock' => 60, 'category_id' => 2, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Levi\'s 501 Original Jeans', 'description' => 'Classic straight fit denim jeans', 'price' => 950000, 'stock' => 100, 'category_id' => 2, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Ray-Ban Wayfarer Sunglasses', 'description' => 'Iconic sunglasses with UV protection', 'price' => 1800000, 'stock' => 35, 'category_id' => 2, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Adidas Ultraboost Running Shoes', 'description' => 'High-performance running shoes with Boost technology', 'price' => 3200000, 'stock' => 50, 'category_id' => 2, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'The North Face Jacket', 'description' => 'Waterproof outdoor jacket for all weather', 'price' => 4500000, 'stock' => 30, 'category_id' => 2, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],

            // Home & Living
            ['name' => 'IKEA MALM Bed Frame', 'description' => 'Modern bed frame with storage option', 'price' => 3500000, 'stock' => 20, 'category_id' => 3, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Philips Smart LED Bulb', 'description' => 'WiFi-enabled color changing LED bulb', 'price' => 250000, 'stock' => 150, 'category_id' => 3, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Dyson V15 Vacuum Cleaner', 'description' => 'Cordless vacuum with laser detection', 'price' => 12500000, 'stock' => 15, 'category_id' => 3, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],

            // Books
            ['name' => 'Atomic Habits by James Clear', 'description' => 'Bestselling book about building good habits', 'price' => 180000, 'stock' => 200, 'category_id' => 4, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'The Psychology of Money', 'description' => 'Financial wisdom and wealth building guide', 'price' => 150000, 'stock' => 180, 'category_id' => 4, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Clean Code', 'description' => 'A handbook of agile software craftsmanship', 'price' => 450000, 'stock' => 75, 'category_id' => 4, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],

            // Sports & Outdoor
            ['name' => 'Yoga Mat Premium', 'description' => 'Non-slip exercise mat with extra cushioning', 'price' => 350000, 'stock' => 80, 'category_id' => 5, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Dumbbells Set 20kg', 'description' => 'Adjustable dumbbell set for home workout', 'price' => 1500000, 'stock' => 40, 'category_id' => 5, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Wilson Basketball', 'description' => 'Professional quality basketball', 'price' => 450000, 'stock' => 55, 'category_id' => 5, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],

            // Beauty & Health
            ['name' => 'Cetaphil Gentle Skin Cleanser', 'description' => 'Dermatologist-recommended facial cleanser', 'price' => 180000, 'stock' => 120, 'category_id' => 6, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'The Ordinary Niacinamide Serum', 'description' => 'High-strength vitamin and zinc serum', 'price' => 95000, 'stock' => 200, 'category_id' => 6, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Omron Blood Pressure Monitor', 'description' => 'Digital blood pressure monitoring device', 'price' => 650000, 'stock' => 45, 'category_id' => 6, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],

            // Gaming
            ['name' => 'PlayStation 5', 'description' => 'Next-gen gaming console with 4K graphics', 'price' => 8500000, 'stock' => 30, 'category_id' => 18, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Xbox Series X', 'description' => 'Powerful gaming console with Game Pass', 'price' => 8000000, 'stock' => 25, 'category_id' => 18, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Nintendo Switch OLED', 'description' => 'Hybrid gaming console with vibrant OLED screen', 'price' => 5500000, 'stock' => 40, 'category_id' => 18, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],

            // Computers & Laptops
            ['name' => 'MacBook Pro 14" M3', 'description' => 'Professional laptop with M3 chip', 'price' => 32000000, 'stock' => 20, 'category_id' => 21, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Dell XPS 13', 'description' => 'Premium ultrabook with InfinityEdge display', 'price' => 22000000, 'stock' => 25, 'category_id' => 21, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Logitech MX Master 3S Mouse', 'description' => 'Advanced wireless mouse for productivity', 'price' => 1500000, 'stock' => 70, 'category_id' => 21, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Mechanical Keyboard RGB', 'description' => 'Gaming keyboard with Cherry MX switches', 'price' => 1800000, 'stock' => 60, 'category_id' => 21, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],

            // Camera & Photography
            ['name' => 'Canon EOS R6', 'description' => 'Full-frame mirrorless camera', 'price' => 38000000, 'stock' => 10, 'category_id' => 23, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'Sony Alpha A7 IV', 'description' => 'Versatile full-frame hybrid camera', 'price' => 42000000, 'stock' => 8, 'category_id' => 23, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
            ['name' => 'GoPro Hero 12', 'description' => 'Action camera with 5.3K video', 'price' => 6500000, 'stock' => 35, 'category_id' => 23, 'store_id' => 2, 'image_url' => '/storage/products/default.jpg'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
