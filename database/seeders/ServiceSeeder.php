<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $services = [
            [
                'title' => 'Our Services',
                'description' => 'We offer personalized solutions tailored for each customer.',
                'icon' => 'bi bi-activity',
            ],
            [
                'title' => 'Custom Solutions',
                'description' => 'Our services provide unique solutions tailored to every client’s needs.',
                'icon' => 'bi bi-broadcast',
            ],
            [
                'title' => 'Innovative Approaches',
                'description' => 'We solve your problems using innovative methods and strategies.',
                'icon' => 'bi bi-easel',
            ],
            [
                'title' => 'Fast and Efficient Services',
                'description' => 'We offer fast and efficient services with a strong focus on quality.',
                'icon' => 'bi bi-bounding-box-circles',
            ],
            [
                'title' => 'Expert Consultation',
                'description' => 'Our experts provide top-notch consultations to help you grow.',
                'icon' => 'bi bi-calendar4-week',
            ],
            [
                'title' => 'Customer Communication',
                'description' => 'We maintain open and friendly communication with our clients. We always listen.',
                'icon' => 'bi bi-chat-square-text',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('Services seeded successfully!');
    }
}
