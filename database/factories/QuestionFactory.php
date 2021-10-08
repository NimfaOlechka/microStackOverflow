<?php

namespace Database\Factories;

use App\Models\Question;
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
            'user_id' => User::factory(),
            'category_id' => Tag::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(10),
            'excerpt' => $this->faker->paragraph(5),            
            'published_at' => $this->faker->date(),
            'body' => $this->faker->paragraphs(10), 
            'vote_rank' => $rndNumber,           
            'thumbnail' => 'thumbnails/illustration-' . $rndNumber.'.png'
        ];
    }
}
