<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteAlert>
 */
class SiteAlertFactory extends Factory
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
            'description' => fake()->paragraph,
            'link_url' => fake()->boolean(60) ? fake()->url : null,
            'link_text' => fake()->boolean(60) ? 'Learn more' : null,
            'starts_at' => null,
            'ends_at' => null,
            'is_active' => fake()->boolean(30),
        ];
    }
}
