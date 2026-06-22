<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_name' => $this->faker->randomElement([
                'Lajmet e Fundit', 
                'Grupi i Laravel', 
                'Ndihmë për SQL', 
                'Studentët 2024', 
                'Chat me Profesorin'
            ]),
            'kapaciteti' => 100,
            'pershkrimi' => 'Ky është një grup chat-i për ' . $this->faker->word(),
        ];
    }
}
