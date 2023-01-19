<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Programme>
 */
class ProgrammeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "department_id" => Department::inRandomOrder()->first()->id,
            "description" => fake()->sentence,
            "name" => fake()->company,
            "short_name" => fake()->word,
            "duration" => fake()->randomNumber,
            "prerequisite" => fake()->paragraph,
            "fee" => fake()->randomNumber,
            "show_fee" => array_rand([true, false])
        ];
    }
}
