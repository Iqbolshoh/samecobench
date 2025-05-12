<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutItem;

class AboutItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            'Biz har bir mijozning ehtiyojlariga mos yuqori sifatli xizmatlarni taqdim etamiz.',
            'Biz zamonaviy texnologiyalar yordamida innovatsion yechimlar ishlab chiqamiz.',
            'Har bir loyihaga shaxsiy yondashamiz va ijodiy g‘oyalarni taklif qilamiz.',
            'Tajribali mutaxassislarimiz har qanday muammoni hal qilishga tayyor.',
            'Qo‘llab-quvvatlash jamoamiz har doim mijozlarimizga yordam berishga tayyor.',
            'Biz xizmat sifatini innovatsion yondashuvlar bilan oshiramiz.',
            'Har bir noyob loyiha uchun maxsus strategiyalar yaratamiz.',
            'Biz mijozlarimizga yangi imkoniyatlarni ochishda yordam beramiz.',
        ];

        foreach ($items as $item) {
            AboutItem::create([
                'about_id' => 1,
                'bullet_point' => $item,
            ]);
        }

        $this->command->info('About items seeded successfully!');
    }
}
