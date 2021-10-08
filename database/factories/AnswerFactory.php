<?php

namespace Database\Factories;

use App\Models\{Answer, Comment, Question, Rating, Tag, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => 1, 
            'question_id' => 2,
            'created_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'body' => $this->faker->paragraph(5)
        ];
    }
}
