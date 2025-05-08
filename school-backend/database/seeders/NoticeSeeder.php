<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notice;
use App\Models\User;

class NoticeSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $admin = User::role('admin')->first();

        $notices = [
            [
                'title' => 'Holiday Announcement',
                'content' => 'The school will be closed next Thursday for a public holiday.',
                'target_role' => null,
                'posted_by' => $admin->id,
                'posted_at' => now(),
            ],
            [
                'title' => 'Exam Schedule Released',
                'content' => 'The midterm exam schedule is now available on the school portal.',
                'target_role' => 'student',
                'posted_by' => $admin->id,
                'posted_at' => now()->subDays(2),
            ],
        ];

        foreach ($notices as $notice) {
            Notice::create($notice);
        }
    }
}
