<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::get()->random()->id,
            'forum_id' => Forum::get()->random()->id,
            'comment' => $this->faker->paragraph(5),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
