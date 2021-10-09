<?php

namespace Database\Factories;

use App\Models\{Answer, Comment, Question, Rating, Tag, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => 5, 
            'answer_id' => 1,
            'vote' => 1,
            'created_at' => $this->faker->date(),
            
        ];
    }
}
