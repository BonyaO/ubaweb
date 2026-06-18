<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => fake()->sentence,
            'slug' => fake()->slug,
            'summary' => Str::limit(fake()->sentences(3, true), 250),
            'detail' => fake()->paragraphs(3, true),
            'is_published' => fake()->randomElement([true, false]),
        ];
    }
}
