<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Model\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => rand(1, 10),
            'post_id' => rand(1, 10),
            'body' => $this->faker->paragraph(35),
        ];
    }
}
