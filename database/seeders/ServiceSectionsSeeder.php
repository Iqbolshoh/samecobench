<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceSection;

class ServiceSectionsSeeder extends Seeder
{
    public function run()
    {
        ServiceSection::create([
            'title' => 'Bizning Xizmatlarimiz',
            'text_1' => 'Bizning tajribamiz va ko\'nikmalarimiz eng yaxshi xizmat tajribasini taqdim etish uchun moslashtirilgan. Bizning takliflarimiz sizga yuqori sifatli va tezkor yechimlarni taqdim etishga mo\'ljallangan.',
            'image' => 'services-images/01JTW56PWQ74AGDHFZTV4Y1V9E.jpg',
            'sub_title' => 'Mahsulotni Ishlab Chiqish va Yetkazib Berish Yondashuvimiz',
            'text_2' => 'Biz mahsulot yaratishda zamonaviy texnologiyalarni qo\'llab-quvvatlaymiz va har doim eng so\'nggi innovatsiyalarni taqdim etishga intilamiz.',
        ]);        

        $this->command->info('Service Sections seeded successfully!');
    }
}
