<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index() 
    {        
        //ddd(Question::all());
        return view('questions.index', [
               'questions'=> Question::all()
            
        ]);  

    }

    public function show(Question $question) 
    {
        //dd($question);
        return view('questions.show', [
            'question' => $question
        ]);
    }   
}
