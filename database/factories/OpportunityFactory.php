<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'type' => fake()->randomElement(['grant', 'project', 'scholarship']),
            'status' => fake()->randomElement(['draft', 'open', 'closed']),
            'summary' => fake()->sentence,
            'detail' => fake()->paragraph,
            'website' => fake()->boolean(70) ? fake()->url : null,
            'deadline' => fake()->boolean(60) ? fake()->dateTimeBetween('now', '+6 months') : null,
            'is_published' => fake()->boolean(80),
        ];
    }
}
