<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PressRelease>
 */
class PressReleaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => fake()->words(10, true),
            "signed_on" => fake()->date,
            "file" => fake()->imageUrl,
            "image" => fake()->imageUrl,
            "description" => fake()->sentence
        ];
    }
}
