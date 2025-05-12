<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'title' => 'Our Services',
            'text_1' => "We are ready to provide you with innovative architectural designs and unique solutions powered by renewable energy sources such as solar panels, wind turbines, and mini hydropower systems. Our team is always committed to achieving the best results. We constantly develop our expertise to offer the most efficient solutions to our clients.",
            'text_2' => "Building long-term and trustworthy relationships with our clients is our top priority.",
            'image' => 'about-images/01JTW4V2P04DS50V40QB4F845Z.jpg',
        ]);

        $this->command->info('About section seeded successfully!');
    }
}
