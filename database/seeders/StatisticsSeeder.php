<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statistics;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statistics::create([
            'icon' => 'bi bi-emoji-smile',
            'count' => 50,
            'title' => 'Baxtli Mijozlar',
            'description' => 'Bizning muvaffaqiyatimiz mijozlarimizning mamnuniyati bilan o‘lchanadi.',
        ]);
        
        Statistics::create([
            'icon' => 'bi bi-journal-richtext',
            'count' => 30,
            'title' => 'Loyihalar',
            'description' => 'Bizning kreativlik va innovatsiyamiz amalda.',
        ]);
        
        Statistics::create([
            'icon' => 'bi bi-headset',
            'count' => 1453,
            'title' => 'Qo‘llab-quvvatlash Soatlari',
            'description' => 'Biz doimo mijozlarimizga yordam berish uchun mavjudmiz.',
        ]);
        
        Statistics::create([
            'icon' => 'bi bi-people',
            'count' => 15,
            'title' => 'Mehnatkash Jamoa',
            'description' => 'Bizning bag‘rikeng jamoamiz barchasini amalga oshirmoqda.',
        ]);
        
        $this->command->info('Statistics seeded successfully!');
    }
}
