<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'image_url' => $this->faker->imageUrl(640,480), 
            'preview' => $this->faker->text(100),
            'content' => $this->faker->paragraphs(4, true),
            'user_id' => $this->faker->numberBetween(1, 2),
            'category_id' => $this->faker->numberBetween(1, 4),
            'created_at'=> now(),
            'updated_at'=> now()
        ];
    }
}
