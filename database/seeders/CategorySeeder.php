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
                'name' => 'Ilova',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mahsulot',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Brendlash',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kitob',
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
