<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Programme>
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
            'department_id' => Department::inRandomOrder()->first()->id,
            'description' => fake()->sentence,
            'name' => fake()->company,
            'short_name' => fake()->word,
            'duration' => fake()->numberBetween(1, 6),
            'prerequisite' => fake()->paragraph,
            'fee' => fake()->numberBetween(50000, 500000),
            'show_fee' => fake()->boolean(),
        ];
    }
}
