<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsList = [
            [
                'title' => 'Laravel Ustasi: Iqbolshohning Blade Konversiya Loyihasi',
                'description' => 'Iqbolshoh eski PHP veb-saytlarini zamonaviy Laravel Blade ilovalariga aylantirmoqda, bu esa kodni toza, tez va boshqarish oson qiladi. Uning ishlari dasturchilar jamoasida mashhurlikka erishmoqda.',
                'image' => 'news-images/01JV1F1WJ31QJH3XCCY9ZEK3T6.jpg',
                'views' => 453,
            ],
            [
                'title' => 'Iqbolshoh Ilhomjonov e-kurs.uz platformasini ishga tushirdi',
                'description' => 'Samarqandlik yosh va ambitsiyali full-stack dasturchi Iqbolshoh rasmiy ravishda e-kurs.uz platformasining ishga tushirilganini e’lon qildi — bu C++, Laravel va zamonaviy veb-texnologiyalarni o‘rgatish uchun mo‘ljallangan ta’lim platformasi!',
                'image' => 'news-images/01JV08YNT4SKC4ZJR4RMPBEVM7.jpg',
                'views' => 570,
            ],
            [
                'title' => 'Talabadan Mentor: Iqbolshoh 50+ O‘rganuvchilarni Ilhomlantiradi',
                'description' => 'Kodlash va o‘qitishga bo‘lgan ishtiyoq bilan, Iqbolshoh hozirda C++ va veb-dasturlash bo‘yicha 50+ talabani o‘qitmoqda. Uning amaliy yondoshuvi va real loyihalari uni mahalliy texnologiya ikoniga aylantirdi.',
                'image' => 'news-images/01JV08Z9CPYFHWM6W2YCB7VR8V.jpg',
                'views' => 720,
            ],
            [
                'title' => 'Texnologik Vizyoner Iqbolshoh Shaxsiy Veb-Serverini Qurdi',
                'description' => 'NGINX va Linuxni ishlatib, Iqbolshoh o‘z kompyuterini to‘liq veb-serverga aylantirdi va test.iqbolshoh.uz kabi o‘z domeniga ega bo‘ldi. Endi u ilovalarni professional tarzda hosting qilmoqda!',
                'image' => 'news-images/01JV092NGPX2JDHNTQX78KFM7F.jpg',
                'views' => 777,
            ],
        ];

        collect($newsList)->each(function ($news) {
            News::create($news);
        });

        $this->command->info(string: 'News data seeded successfully!');
    }
}
