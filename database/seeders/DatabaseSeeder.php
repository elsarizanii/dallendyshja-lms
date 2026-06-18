<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Staff;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void{
  $user = User::create([
        'name' => 'Profesor Filani',
        'email' => 'profesor@scantech.com',
        'password' => Hash::make('password'),
        'role' => 'Staff'
    ]);

    User::factory()->create([
        'name' => 'Manager Elsa',
        'email' => 'admin@scantech.com',
        'password' => bcrypt('password123'),
        'role' => 'Manager',
    ]);

    User::create([
        'name' => 'Intern Manager',
        'email' => 'admin@test.com',
        'password' => Hash::make('password'),
        'role' => 'Manager',
    ]);

    Staff::create([
        'user_id' => $user->id,
        'department' => 'Programim',
        'specialization' => 'Laravel & SQL'
    ]);

    $cat = Category::create([
        'emertimi' => 'Backend Development',
        'pershkrimi' => 'Mësoni gjithçka rreth serverave.'
    ]);

    Course::create([
        'titulli' => 'Kursi i parë në Laravel',
        'pershkrimi' => 'Hapat e parë në zhvillim.',
        'cmimi' => 99.99,
        'category_id' => $cat->id,
        'instructor_id' => $user->id
    ]);
}
}