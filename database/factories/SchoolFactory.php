<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "logo" => fake()->imageUrl,
            "image" => fake()->imageUrl,
            "name" => fake()->company,
            "short_name" => fake()->word,
            "mission_statement" => fake()->paragraph,
            "website" => fake()->url,
            "description" => fake()->sentence,
            "is_school" => array_rand([true, false])
        ];
    }
}
