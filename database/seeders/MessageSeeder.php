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
                'subject' => 'Hello!',
                'body' => 'I have a question about Laravel.',
                'status' => 'read',
            ],
            [
                'sender_name' => 'Ahmad',
                'sender_email' => 'ahmad@gmail.com',
                'subject' => 'Offer',
                'body' => 'Your website is awesome!',
                'status' => 'read',
            ],
            [
                'sender_name' => 'Sara',
                'sender_email' => 'sara@mail.com',
                'subject' => 'Partnership',
                'body' => 'I would like to collaborate.',
                'status' => 'read',
            ],
            [
                'sender_name' => 'John',
                'sender_email' => 'john@example.com',
                'subject' => 'Project',
                'body' => 'Your portfolio is impressive.',
                'status' => 'read',
            ],
            [
                'sender_name' => 'Zarina',
                'sender_email' => 'zarina@yahoo.com',
                'subject' => 'Need Help',
                'body' => 'I am getting an error with Filament forms.',
                'status' => 'unread',
            ],
            [
                'sender_name' => 'Karim',
                'sender_email' => 'karim@domain.com',
                'subject' => 'Check',
                'body' => 'There is an error on the site.',
                'status' => 'unread',
            ],
            [
                'sender_name' => 'Ali',
                'sender_email' => 'ali@ali.com',
                'subject' => 'Question',
                'body' => 'Please write about setting up NGINX.',
                'status' => 'unread',
            ],
        ];

        collect($messages)->each(function ($message) {
            Message::create($message);
        });

        $this->command->info('All messages seeded successfully!');
    }
}
