<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supermarket>
 */
class SupermarketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=>fake()->name(),
            "introdcution"=>fake()->paragraphs(),
            "shop_no"=>fake()->numberBetween(1, 2000),
            "city"=>fake()->city(),
            "address"=>fake()->streetAddress()
        ];
    }
}
