<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(['role' => 'Student']),
            'parent_id' => null,
            'current_level' => fake()->randomElement(['A1', 'A2', 'B1', 'B2', 'C1']),
            'date_of_birth' => fake()->date('Y-m-d', '-15 years'),
        ];
    }

}
