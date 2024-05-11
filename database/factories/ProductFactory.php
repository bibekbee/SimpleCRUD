<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Electronics', 'Clothing', 'Books', 'Dinks', 'Food', 'Device', 'Vehicle']),
            'price' => fake()->randomFloat(2, 10, 100),
            'quantity' => fake()->randomNumber(5),
            'user_id' => 1,
        ];
    }
}
