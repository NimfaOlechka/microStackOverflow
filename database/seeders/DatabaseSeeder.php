<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Answer, Comment, Question, Rating, Tag, User};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // User::factory(5)->create();
         //Tag::factory()->create();

        /*  $question = Question::create([
            'user_id' => 15,
            'tag_id' => 2,
            'title' => "c# question",
            'slug' => 'csharp-question',
            'excerpt' => 'some excerpt for question',            
            'published_at' => now(),
            'body' => 'some long question text',                       
            'thumbnail' => 'thumbnails/illustration-1.png'
            ]
        );  */

       /*  $answer = Answer::create([
            'user_id' => 16, 
            'question_id' => 1,
            'created_at' => now(),
            'body' => 'answer for the question'
        ]); */

        Question::factory(5)->create(); 
        //Answer::factory()->create();
       // Rating::factory()->create();

    }
}
