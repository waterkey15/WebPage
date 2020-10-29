<?php

namespace Database\Factories;

use App\Models\Model\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
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
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(35),
            'user->id' => rand(1, 10),
            'category->id' => rand(1, 10),
            'is_published' => rand(1, 10)
        ];
    }
}
