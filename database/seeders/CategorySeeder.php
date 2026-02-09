<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Electronic devices and gadgets'],
            ['name' => 'Fashion', 'description' => 'Clothing and accessories'],
            ['name' => 'Home & Living', 'description' => 'Furniture and home decor'],
            ['name' => 'Books', 'description' => 'Books and educational materials'],
            ['name' => 'Sports & Outdoor', 'description' => 'Sports equipment and outdoor gear'],
            ['name' => 'Beauty & Health', 'description' => 'Cosmetics and health products'],
            ['name' => 'Toys & Games', 'description' => 'Toys and gaming products'],
            ['name' => 'Automotive', 'description' => 'Car accessories and parts'],
            ['name' => 'Food & Beverages', 'description' => 'Snacks, drinks, and food items'],
            ['name' => 'Office Supplies', 'description' => 'Stationery and office equipment'],
            ['name' => 'Jewelry & Watches', 'description' => 'Jewelry and timepieces'],
            ['name' => 'Pet Supplies', 'description' => 'Pet food and accessories'],
            ['name' => 'Garden & Outdoor', 'description' => 'Gardening tools and outdoor furniture'],
            ['name' => 'Baby & Kids', 'description' => 'Baby care and kids products'],
            ['name' => 'Music & Instruments', 'description' => 'Musical instruments and accessories'],
            ['name' => 'Arts & Crafts', 'description' => 'Art supplies and craft materials'],
            ['name' => 'Kitchen & Dining', 'description' => 'Cookware and dining essentials'],
            ['name' => 'Gaming', 'description' => 'Video games and gaming consoles'],
            ['name' => 'Bags & Luggage', 'description' => 'Bags, backpacks, and travel luggage'],
            ['name' => 'Footwear', 'description' => 'Shoes and sandals'],
            ['name' => 'Computers & Laptops', 'description' => 'Computers, laptops, and accessories'],
            ['name' => 'Mobile Phones & Tablets', 'description' => 'Smartphones and tablets'],
            ['name' => 'Camera & Photography', 'description' => 'Cameras and photography equipment'],
            ['name' => 'Smart Home', 'description' => 'Smart home devices and automation'],
            ['name' => 'Fitness Equipment', 'description' => 'Gym equipment and fitness gear'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
