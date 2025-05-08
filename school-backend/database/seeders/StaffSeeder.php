<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;
use App\Models\User;
use App\Models\Department;

class StaffSeeder extends Seeder
{
    public function run()
    {
        $users = User::role('staff')->get(); // ✅ correct Spatie syntax
        $departments = Department::all();

        foreach ($users as $user) {
            Staff::factory()->create([
                'user_id' => $user->id,
                'department_id' => $departments->random()->id,
                'position' => fake()->jobTitle,
                'hire_date' => fake()->dateTimeBetween('-5 years', 'now'),
            ]);
        }
    }
}
