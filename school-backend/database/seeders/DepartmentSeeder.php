<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $departments = ['Mathematics', 'Science', 'History', 'Languages'];

        foreach ($departments as $name) {
            Department::create(['name' => $name]);
        }
    }
}
