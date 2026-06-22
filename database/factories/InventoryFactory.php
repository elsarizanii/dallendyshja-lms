<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'category' => 'Hardware',
            'language' => 'Albanian',
            'price' => $this->faker->randomFloat(2, 50, 500),
            'stock_level' => 10,
            'min_stock_alert' => 2,
        ];
    }

}
