<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Room;
use App\Models\Course;
use App\Models\Inventory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
   public function run(): void
{
    \App\Models\Room::factory(5)->create();

    $user = \App\Models\User::updateOrCreate(
        ['email' => 'profesor@scantech.com'],
        [
            'name' => 'Profesor Filani',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'Staff'
        ]
    );

    $staff = \App\Models\Staff::updateOrCreate(
        ['user_id' => $user->id],
        ['department' => 'Programim']
    );

    \App\Models\Inventory::factory(20)->create();

    $cat = \App\Models\Category::firstOrCreate(['emertimi' => 'Backend']);
    
    \App\Models\Course::factory(10)->create([
        'category_id' => $cat->id,
        'instructor_id' => $staff->id
    ]);
}
}