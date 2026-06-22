<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'titulli' => $this->faker->sentence(3),
            'pershkrimi' => $this->faker->paragraph(),
            'cmimi' => $this->faker->randomFloat(2, 50, 200),
            'category_id' => \App\Models\Category::factory(),
            'instructor_id' => \App\Models\User::factory(),
        ];
    }

}
