<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\ForumCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum>
 */
class ForumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->paragraph(1);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'forum_category_id' => ForumCategory::get()->random()->id,
            'body' => $this->faker->paragraph(20),
            'user_id' => User::get()->random()->id,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
