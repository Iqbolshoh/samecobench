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
                'service_name' => 'Mintaqaviy Mahsulotni Rivojlantirish',
                'skill_level' => 95,
            ],
            [
                'service_name' => 'Mobilga Yo‘naltirilgan Tezkor Javob Xizmatlari',
                'skill_level' => 85,
            ],
            [
                'service_name' => 'Xavfsizlik Xizmatlari',
                'skill_level' => 80,
            ],
            [
                'service_name' => 'Malumotlar Bazasini Boshqarish',
                'skill_level' => 95,
            ],
            [
                'service_name' => 'Ijodiy Ekologik Arxitektura',
                'skill_level' => 75,
            ],
        ];        

        foreach ($services as $service) {
            OurServices::create($service);
        }

        $this->command->info('Our Services seeded successfully!');
    }
}
