<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            [
                'sender_name' => 'Iqbolshoh',
                'sender_email' => 'iqbolshoh@gmail.com',
                'subject' => 'Salom!',
                'body' => 'Men Laravel haqida savolim bor.',
                'status' => 'read',
            ],
            [
                'sender_name' => 'Ahmad',
                'sender_email' => 'ahmad@gmail.com',
                'subject' => 'Taklif',
                'body' => 'Sizning veb-saytingiz juda zo‘r!',
                'status' => 'read',
            ],
            [
                'sender_name' => 'Sara',
                'sender_email' => 'sara@mail.com',
                'subject' => 'Hamkorlik',
                'body' => 'Men hamkorlik qilishni xohlayman.',
                'status' => 'read',
            ],
            [
                'sender_name' => 'John',
                'sender_email' => 'john@example.com',
                'subject' => 'Loyiha',
                'body' => 'Sizning portfolioingiz juda ta’sirli.',
                'status' => 'read',
            ],
            [
                'sender_name' => 'Zarina',
                'sender_email' => 'zarina@yahoo.com',
                'subject' => 'Yordam Kerak',
                'body' => 'Men Filament shakllari bilan xatolik yuzaga kelmoqda.',
                'status' => 'unread',
            ],
            [
                'sender_name' => 'Karim',
                'sender_email' => 'karim@domain.com',
                'subject' => 'Tekshirish',
                'body' => 'Saytda xatolik mavjud.',
                'status' => 'unread',
            ],
            [
                'sender_name' => 'Ali',
                'sender_email' => 'ali@ali.com',
                'subject' => 'Savol',
                'body' => 'Iltimos, NGINX sozlamalari haqida yozing.',
                'status' => 'unread',
            ],
        ];        

        collect($messages)->each(function ($message) {
            Message::create($message);
        });

        $this->command->info('All messages seeded successfully!');
    }
}
