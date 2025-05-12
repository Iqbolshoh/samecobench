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
                'title' => 'Bizning Xizmatlarimiz',
                'description' => 'Biz har bir mijozga moslashtirilgan shaxsiylashtirilgan yechimlarni taqdim etamiz.',
                'icon' => 'bi bi-activity',
            ],
            [
                'title' => 'Maxsus Yechimlar',
                'description' => 'Bizning xizmatlarimiz har bir mijozning ehtiyojlariga moslashtirilgan noyob yechimlarni taqdim etadi.',
                'icon' => 'bi bi-broadcast',
            ],
            [
                'title' => 'Innovatsion Yondashuvlar',
                'description' => 'Biz sizning muammolaringizni innovatsion usullar va strategiyalar bilan hal qilamiz.',
                'icon' => 'bi bi-easel',
            ],
            [
                'title' => 'Tez va Samarali Xizmatlar',
                'description' => 'Biz tez va samarali xizmatlarni taqdim etamiz, yuqori sifatga katta e’tibor qaratamiz.',
                'icon' => 'bi bi-bounding-box-circles',
            ],
            [
                'title' => 'Mutaxassislar Maslahati',
                'description' => 'Bizning mutaxassislarimiz sizning o‘sishingizga yordam berish uchun eng yuqori darajadagi maslahatlarni taqdim etadi.',
                'icon' => 'bi bi-calendar4-week',
            ],
            [
                'title' => 'Mijozlar Bilan Aloqa',
                'description' => 'Biz mijozlarimiz bilan ochiq va do\'stona aloqani saqlaymiz. Biz doimo tinglaymiz.',
                'icon' => 'bi bi-chat-square-text',
            ],
        ];        

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('Services seeded successfully!');
    }
}
