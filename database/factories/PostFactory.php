<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'category_id'=> Category::factory(),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'published_at' => fake()->dateTime(),
            'excerpt' => '<p>' . implode('<p></p>', $this->faker->paragraphs(2)) . '</p>' , //hacky way to turn an array of paragraphs into strings seperated by paragraph tags
            'body' => $this->faker->paragraph,
        ];
    }
}
