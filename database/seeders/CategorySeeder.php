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
            [
                'name' => 'App',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Branding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Books',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        collect($categories)->each(function ($category) {
            Category::create($category);
        });

        $this->command->info('Categories seeded successfully!');
    }
}
