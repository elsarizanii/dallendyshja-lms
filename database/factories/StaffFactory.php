<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
      public function definition(): array{
        return [
            'user_id' => \App\Models\User::factory(['role' => 'Staff']), 
            'hire_date' => fake()->date(),
            'department' => fake()->randomElement(['English Dept', 'German Dept', 'Administration']),
            'specialization' => fake()->randomElement(['Linguistics', 'Literature', 'Business English']),
        ];
    }
}
