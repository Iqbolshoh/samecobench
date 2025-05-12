<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialLinks = [
            ['title' => 'Description', 'icon' => '', 'link' => '', 'value' => 'This is a brief description of my services and contact information.', 'is_active' => true],
            ['title' => 'Address', 'icon' => 'bi bi-geo-alt', 'link' => '', 'value' => 'Samarkand City, Boulevard', 'is_active' => true],
            ['title' => 'Email', 'icon' => 'bi bi-envelope', 'link' => 'mailto:', 'value' => 'iilhomjonov777@gmail.com', 'is_active' => true],
            ['title' => 'Phone', 'icon' => 'bi bi-telephone', 'link' => 'tel:', 'value' => '+998997799333', 'is_active' => true],
            ['title' => 'Telegram', 'icon' => 'bi bi-telegram', 'link' => 'https://t.me/', 'value' => 'iqbolshoh_777', 'is_active' => true],
            ['title' => 'Facebook', 'icon' => 'bi bi-facebook', 'link' => 'https://facebook.com/', 'value' => null, 'is_active' => false],
            ['title' => 'Instagram', 'icon' => 'bi bi-instagram', 'link' => 'https://instagram.com/', 'value' => 'iqbolshoh_777', 'is_active' => true],
            ['title' => 'WhatsApp', 'icon' => 'bi bi-whatsapp', 'link' => 'https://wa.me/', 'value' => null, 'is_active' => false],
            ['title' => 'X (Twitter)', 'icon' => 'bi bi-twitter-x', 'link' => 'https://twitter.com/', 'value' => null, 'is_active' => false],
            ['title' => 'LinkedIn', 'icon' => 'bi bi-linkedin', 'link' => 'https://linkedin.com/in/', 'value' => null, 'is_active' => false],
            ['title' => 'TikTok', 'icon' => 'bi bi-tiktok', 'link' => 'https://tiktok.com/', 'value' => null, 'is_active' => false],
            ['title' => 'YouTube', 'icon' => 'bi bi-youtube', 'link' => 'https://youtube.com/', 'value' => null, 'is_active' => false],
        ];

        foreach ($socialLinks as $link) {
            SocialLink::create($link);
        }

        $this->command->info('Social Links seeded successfully!');
    }
}
