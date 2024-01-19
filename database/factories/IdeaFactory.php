<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Idea;
use App\Models\Tag;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::inRandomOrder()->first()->id,
            'tag_id'=>Tag::inRandomOrder()->first()->id,
            'idea_title'=>fake()->word(),
            'idea_background'=>fake()->realText(20),
            'idea_goal'=>fake()->word(),
            'idea_detail'=>fake()->realText(20),
        ];
    }
}
