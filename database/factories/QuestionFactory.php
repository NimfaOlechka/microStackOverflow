<?php

namespace Database\Factories;

use App\Models\{Answer, Comment, Question, Rating, Tag, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rndNumber = $this->faker->randomElement([rand(1,5)]);
        return [
            'user_id' => 2,
            'tag_id' => 2,
            'title' => $this->faker->sentence(),
            'thumbnail' => 'thumbnails/illustration-1.png',
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(), 
            'body' => $this->faker->paragraph(),           
            'published_at' => $this->faker->date()      
            
        ];
    }
}
