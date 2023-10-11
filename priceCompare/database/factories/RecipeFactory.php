<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'name' =>fake()->name(),
            'description' => fake()->paragraph(random_int(50, 100))
        ];
    }
}
