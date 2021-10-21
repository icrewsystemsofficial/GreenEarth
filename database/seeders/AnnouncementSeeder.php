<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->line('Seeding Announcements from AnnouncementSeeder file...');
        
        $announcement = new Announcement;
        $announcement->title = "Test Announcement 1";
        $announcement->body = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, quibusdam a fugit amet veritatis aliquam est assumenda, natus architecto quas quidem nemo veniam nihil repudiandae? Perspiciatis mollitia praesentium dolorum incidunt.";
        $announcement->role = "admin";
        $announcement->status = "1";
        $announcement->slug = "test-announcement-1";
        $announcement->author = "Melissa";
        $announcement->save();

        $announcement = new Announcement;
        $announcement->title = "Test Announcement 2";
        $announcement->body = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos distinctio excepturi explicabo voluptas animi impedit eveniet, corrupti alias similique id.";
        $announcement->role = "volunteer";
        $announcement->status = "1";
        $announcement->slug = "test-announcement-2";
        $announcement->author = "Taehyung";
        $announcement->save();

        $announcement = new Announcement;
        $announcement->title = "Test Announcement 3";
        $announcement->body = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis a magnam impedit deserunt rem? Consectetur natus possimus molestias at ad distinctio impedit?";
        $announcement->role = "user";
        $announcement->status = "0";
        $announcement->slug = "test-announcement-3";
        $announcement->author = "Reza";
        $announcement->save();

        $this->command->info("Announcements created.");
        
    }
}
