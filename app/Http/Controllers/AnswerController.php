<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function store(Question $question)
    {
        
        //validate
        request()->validate([
            'body' => 'required'
        ]);

        //ddd(request()->all());
        //ddd($question->id);

        //save
        Answer::create([
            'user_id' => request()->user()->id, 
            'question_id' => $question->id,
            'body' => request('body'),
        ]);
        /* $question->answers()->create([            
            'user_id' => request()->user()->id, 
            'body' => request('body')
        ]); */

        return back();

    }
    
}
