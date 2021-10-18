<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    //
    public function index() 
    {        
        //ddd(Question::all());
        return view('questions.index', [
               'questions'=> Question::latest()->simplePaginate(5)
            
        ]);  

    }

    public function show(Question $question) 
    {
        //dd($question);
        return view('questions.show', [
            'question' => $question
        ]);
    }   

    public function create()
    {       
       return view('questions.create');
    }

    public function store()
    {        
        //ddd(request()->all());
        
        $attributes = request()->validate([
                'title' => 'required',
                'slug' => ['required',Rule::unique('questions', 'slug')],
                'thumbnail' => ['required', 'image'],
                'excerpt' => 'required',
                'body' => 'required',
                'tag_id' => ['required', Rule::exists('tags','id')]    
            ]); 
            
            $attributes['user_id'] = auth()->id(); 
            $path = request()->file('thumbnail')->store('thumbnails');      
            $attributes['thumbnail'] = $path;
        
            //dd($path);
            $post = Question::create($attributes);
            ddd($post);

        //    return 'Done';
        return redirect('/')->with('success','Your question is published.');         
    } 

   
}
