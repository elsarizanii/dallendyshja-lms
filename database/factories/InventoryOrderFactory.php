<?php

namespace Database\Factories;

use App\Models\InventoryOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<InventoryOrder>
 */
class InventoryOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array{
        return [
            'inventory_item_id' => \App\Models\Inventory::inRandomOrder()->first()->id,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['Pending', 'Completed', 'Cancelled']),
            'notes' => $this->faker->sentence(),
        ];
    }
}
