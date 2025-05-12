<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceSection;

class ServiceSectionsSeeder extends Seeder
{
    public function run()
    {
        ServiceSection::create([
            'title' => 'Our Services',
            'text_1' => 'Our expertise and skills are tailored to deliver the best service experience. Our offerings are designed to provide you with high-quality and fast solutions.',
            'image' => 'services-images/01JTW56PWQ74AGDHFZTV4Y1V9E.jpg',
            'sub_title' => 'Our Approach to Product Development and Delivery',
            'text_2' => 'We support modern technologies in product creation and always strive to deliver the latest innovations.',
        ]);

        $this->command->info('Service Sections seeded successfully!');
    }
}
