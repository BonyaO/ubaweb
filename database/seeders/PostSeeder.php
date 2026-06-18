<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(15)->create()->each(function (Post $post) {
            $post->tags()->attach(Tag::inRandomOrder()->take(rand(1, 3))->pluck('id'));
        });
    }
}
