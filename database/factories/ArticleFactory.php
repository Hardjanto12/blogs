<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(1,3),
            'category_id' => mt_rand(1,3),
            'title' => fake()->word(4),
            'desc' => fake()->words(7,true),
            'text' => fake()->paragraphs(6,true),
        ];
    }
}
