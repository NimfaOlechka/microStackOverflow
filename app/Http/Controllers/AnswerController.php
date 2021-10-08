<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function store(Question $question)
    {
        //dd($post);
        //validate
        request()->validate([
            'body' => 'required'
        ]);

        //save
        $question->answers()->create([            
            'user_id' => request()->user()->id, 
            'body' => request('body')
        ]);

        return back();

    }
    
}
