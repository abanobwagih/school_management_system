<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ParentProfile;
use App\Models\User;

class ParentProfileFactory extends Factory
{
    protected $model = ParentProfile::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
