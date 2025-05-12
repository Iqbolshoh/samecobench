<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'icon_class' => 'bi bi-bounding-box-circles',
                'title' => 'Innovatsion yechimlar',
                'description' => 'Bizning innovatsion yechimlarimiz hayotingiz va biznesingizni o‘zgartirish uchun mo‘ljallangan.',
            ],
            [
                'icon_class' => 'bi bi-calendar4-week',
                'title' => 'Bepul maslahatlar',
                'description' => 'Jamoamizdan mutaxassis maslahatlarini bepul oling va tezroq rivojlaning.',
            ],
            [
                'icon_class' => 'bi bi-broadcast',
                'title' => 'Kuchli tarmoq',
                'description' => 'Bizning kuchli tarmog‘imiz orqali cheksiz imkoniyatlarga ega bo‘ling.',
            ],
        ];        

        collect($features)->each(fn($feature) => Feature::create($feature));

        $this->command->info('Features seeded successfully!');
    }
}
