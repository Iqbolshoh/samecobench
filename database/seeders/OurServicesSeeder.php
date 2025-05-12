<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OurServices;

class OurServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'service_name' => 'Region-Specific Product Development',
                'skill_level' => 95,
            ],
            [
                'service_name' => 'Mobile-First Rapid Response Solutions',
                'skill_level' => 85,
            ],
            [
                'service_name' => 'Security Services',
                'skill_level' => 80,
            ],
            [
                'service_name' => 'Database Management',
                'skill_level' => 95,
            ],
            [
                'service_name' => 'Creative Eco Architecture',
                'skill_level' => 75,
            ],
        ];

        foreach ($services as $service) {
            OurServices::create($service);
        }

        $this->command->info('Our Services seeded successfully!');
    }
}
