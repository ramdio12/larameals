<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'ingredients' => $this->faker->text(),
            'instructions' => $this->faker->text(),
            'serving' => $this->faker->unique()->numberBetween(1, 10),
            'category' => "pork",

        ];
    }
}
