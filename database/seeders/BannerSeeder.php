<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'image' => 'banner-images/01JTW42CNXV32HHWR0N357QHRB.jpg',
                'title' => 'Iqbolshoh saytiga xush kelibsiz',
                'description' => 'Bizning kompaniyamiz sizga yuqori sifatli xizmatlar, innovatsion yechimlar va professionallikni taqdim etadi. Har doim siz uchun eng yaxshisini yaratishga harakat qilamiz.',
                'button_text' => 'Boshlash',
                'button_link' => '/about',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'banner-images/01JTW45HB9P8TT6PE97Z3REX2Y.jpg',
                'title' => 'Biz adolat va ishonchlilik tarafdorimiz',
                'description' => 'Biz har doim mijozlarimizga eng yaxshi xizmat ko‘rsatishga intilamiz. Har bir loyiha biz uchun muhim va unutilmas tajriba bo‘ladi.',
                'button_text' => 'Boshlash',
                'button_link' => '/about',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'banner-images/01JTW478VEE3TCW5MHWZ7T8A77.jpg',
                'title' => 'Biz bilan rivojlaning',
                'description' => 'Sifatli xizmat, yangilikka ochiqlik va halollik — bizning asosiy qadriyatlarimiz. Siz bilan birga kelajakka qadam qo‘yamiz.',
                'button_text' => 'Boshlash',
                'button_link' => '/about',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];        

        collect($banners)->each(function ($banner) {
            Banner::create($banner);
        });

        $this->command->info('Banners seeded successfully!');
    }
}
