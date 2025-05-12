<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'title' => 'Bizning xizmatlarimiz',
            'text_1' => "Biz sizga quyosh panellari, shamol turbinalari va kichik GES kabi qayta tiklanuvchi energiya manbalaridan foydalangan holda innovatsion arxitektura loyihalari va noyob yechimlarni taklif qilishga tayyormiz. Jamoamiz har doim eng yaxshi natijalarga erishishga intiladi. Biz o‘z bilimlarimizni doimiy rivojlantirib, mijozlarimizga eng samarali yechimlarni taklif etishga harakat qilamiz.",
            'text_2' => "Mijozlarimiz bilan uzoq muddatli va ishonchli munosabatlar o‘rnatish bizning eng ustuvor vazifamizdir.",
            'image' => 'about-images/01JTW4V2P04DS50V40QB4F845Z.jpg',
        ]);

        $this->command->info('About section seeded successfully!');
    }
}
