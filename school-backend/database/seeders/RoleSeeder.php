<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin', 'guard_name' => 'sanctum'],
            ['name' => 'teacher', 'guard_name' => 'sanctum'],
            ['name' => 'student', 'guard_name' => 'sanctum'],
            ['name' => 'parent', 'guard_name' => 'sanctum'],
            ['name' => 'staff', 'guard_name' => 'sanctum'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}