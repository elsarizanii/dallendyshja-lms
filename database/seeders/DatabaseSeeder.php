<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Room;
use App\Models\Course;
use App\Models\Student;
use App\Models\Inventory;
use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
   public function run(): void
{
    \App\Models\Room::factory(5)->create();

    $profesorUser = \App\Models\User::updateOrCreate(
        ['email' => 'profesor@scantech.com'],
        [
            'name' => 'Profesor Filani',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'Staff'
        ]
    );
    
    $studentUser = \App\Models\User::updateOrCreate(
        ['email' => 'dardan@test.com'],
        [
            'name' => 'Dardan Berisha',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' =>'Student'
        ]
    );

    \App\Models\Student::updateOrCreate(
        ['user_id' => $studentUser->id],
        [
            'current_level' => 'A1 - Beginner',
            'date_of_birth' =>'2005-05-15',
            'parent_id'=> null
        ]
    );

    echo "User and Student were added successfully! \n";

    $staff = \App\Models\Staff::updateOrCreate(
        ['user_id' => $profesorUser->id],
        ['department' => 'Programim']
    );

    \App\Models\Inventory::factory(20)->create();

    $categoryNames = ['Programming', 'Design', 'Marketing', 'Language'];

    foreach ($categoryNames as $emertimi) {
        $category = \App\Models\Category::firstOrCreate(['emertimi' => $emertimi]);

        \App\Models\Course::factory(15)
            ->create([
                'category_id' => $category->id,
                'instructor_id' => $staff->id
            ])
            ->each(function ($course) {
                \App\Models\Lesson::factory(rand(5, 10))->create([
                    'course_id' => $course->id
                ]);
            });
    }

    echo "Categories, Courses, and nested Lessons seeded successfully! \n";
}
}