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
                'title' => 'Welcome to Eterna',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'button_text' => 'Get Started',
                'button_link' => '/about',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'banner-images/01JTW45HB9P8TT6PE97Z3REX2Y.jpg',
                'title' => 'At vero eos et accusamus',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'button_text' => 'Get Started',
                'button_link' => '/about',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'banner-images/01JTW478VEE3TCW5MHWZ7T8A77.jpg',
                'title' => 'Temporibus autem quibusdam',
                'description' => 'Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.',
                'button_text' => 'Get Started',
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
