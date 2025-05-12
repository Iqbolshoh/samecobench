<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutItem;

class AboutItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            'We provide high-quality services tailored to the specific needs of each client.',
            'We develop innovative solutions using modern technologies.',
            'We apply a personalized approach to every project and suggest creative ideas.',
            'Our experienced specialists are ready to solve any issue.',
            'Our support team is always available for our clients.',
            'We enhance service quality through innovative approaches.',
            'We create special strategies for each unique project.',
            'We help our clients unlock new opportunities.',
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
