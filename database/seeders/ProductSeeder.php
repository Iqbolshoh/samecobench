<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'product_name' => 'Web design Starter Kit',
                'description' => 'A complete set of tools for beginners to start web design with ease. Includes templates, design elements, and guides.',
                'price' => 199.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW5W682PT6TP6MRCJQ5JJ4K.jpg',
                ],
            ],
            [
                'category_id' => 1,
                'product_name' => 'Advanced Web Design',
                'description' => 'Master the art of web design with advanced techniques, responsive design, and modern tools.',
                'price' => 499.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6BBCYF6BNKGPEQMJF3431.jpg',
                ],
            ],
            [
                'category_id' => 1,
                'product_name' => 'Responsive Web Design Course',
                'description' => 'Learn how to design websites that adapt seamlessly across all devices. Perfect for professionals looking to upgrade their skills.',
                'price' => 349.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6CK3ZVQ0W5DCCVF17MSGR.jpg',
                ],
            ],
            [
                'category_id' => 4,
                'product_name' => 'Productivity Suite Pro',
                'description' => 'A suite of advanced productivity tools designed for professionals to manage projects, tasks, and deadlines.',
                'price' => 12313.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6D7QHG9RTC4Y1H0MKX1GJ.jpg',
                ],
            ],
            [
                'category_id' => 4,
                'product_name' => 'Task Management Tool',
                'description' => 'Keep track of your daily tasks, set priorities, and stay on top of your projects with this powerful tool.',
                'price' => 222.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6DXXYB4QA17HYK8DZ178T.jpg',
                ],
            ],
            [
                'category_id' => 4,
                'product_name' => 'Time Tracker',
                'description' => 'Measure how effectively you manage your time, improve your workflow, and optimize your daily routine.',
                'price' => 99.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6EC3MYTGAVZKM7WT222Z3.jpg',
                ],
            ],
            [
                'category_id' => 2,
                'product_name' => 'E-Commerce Web Design',
                'description' => 'A comprehensive guide to building successful online stores with e-commerce platforms like Shopify and WooCommerce.',
                'price' => 499.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6EWFHQYQZDEBW9Z6EAEZA.jpg',
                ],
            ],
            [
                'category_id' => 2,
                'product_name' => 'Online Store Masterclass',
                'description' => 'Take your e-commerce skills to the next level by learning advanced strategies for online selling and marketing.',
                'price' => 799.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6JR8MAN6N1HRV0QE3P66X.jpg',
                ],
            ],
            [
                'category_id' => 2,
                'product_name' => 'Basic E-Commerce Package',
                'description' => 'Launch your first online store with our easy-to-follow guide and templates. Perfect for beginners.',
                'price' => 149.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6H1S65SFHT6SPS5S3H977.jpg',
                ],
            ],
            [
                'category_id' => 3,
                'product_name' => 'Business Analytics Tool',
                'description' => 'Make data-driven decisions and optimize your business processes with our advanced analytics tool.',
                'price' => 499.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6KYZSZ16KHPYAJSAK0HBX.jpg',
                ],
            ],
            [
                'category_id' => 3,
                'product_name' => 'Market Research Software',
                'description' => 'Gather, analyze, and interpret market data to better understand customer behavior and trends.',
                'price' => 799.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6MEKRDXSDW7QHYDF8KN34.jpg',
                ],
            ],
            [
                'category_id' => 3,
                'product_name' => 'Customer Insight Tool',
                'description' => 'Gain deep insights into your customer base with advanced segmentation and behavior analysis.',
                'price' => 1199.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6N66B597Q72N2AP1WMH8J.jpg',
                ],
            ],
        ];

        collect($products)->each(function ($productData) {
            $product = Product::create([
                'category_id' => $productData['category_id'],
                'product_name' => $productData['product_name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
                'created_at' => $productData['created_at'],
                'updated_at' => $productData['updated_at'],
            ]);

            collect($productData['images'])->each(function ($imageUrl) use ($product) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $imageUrl,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            });
        });

        $this->command->info('All products and images seeded successfully!');
    }
}
