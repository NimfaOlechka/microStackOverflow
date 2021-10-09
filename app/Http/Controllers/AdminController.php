<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Mime\Message;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {        
        $id = auth()->id();        
        return view('admin.index', [
            'questions' => Question::where('user_id','=',$id)->get()
        ]);
    }

    public function create()
    {        
        return view('admin.q.create');
    }


    /**
     * TODO: Fix the bug - Creation of the Question 
    */
    public function store(Request $request)
    {       
        
        //ddd(request()->all());
        $id = auth()->user()->id;

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required|unique:questions,slug',
            'excerpt' => 'required',
            'body' => 'required',
            'tag_id' => 'required'            
        ]);

        try
        {
            /* $path='';
            if($attributes['thumbnail'] ?? false)
            {            
                $file = request()->file('thumbnail');            
                $path = Storage::putFile('thumbnail',$file);
            }  */
            
             Question::create([
                'tag_id' => request('tag_id'),
                'title' => request('title'),                
                'slug' => request('slug'),
                'excerpt' => request('excerpt'),
                'body' => request('body'),                
                'user_id' => $id
                
            ]); 
            
        }
        catch(\Illuminate\Database\QueryException $exception)
        {
            return redirect("/")->with('error', 'something wrong'.$exception.getSql());
        }

        return redirect('/')->with('success', 'Hurra!');
        
    }
     

    public function update(Question $post)
    {       
        $attributes = $this->validatePost($post); 
        //ddd($attributes);
        
        if($attributes['thumbnail'] ?? false)
        {            
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);
        return back()->with('success', 'Post Updated!');
    } 

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    } 

    /* protected function validatePost(?Question $question = null): array
    {
        $question ??= new Question();
        return request()->validate([
            'title' => 'required',
            'thumbnail' => $question->exists ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'slug' => ['required',Rule::unique('questions', 'slug')->ignore($question)],
            'body' => 'required',
            'tag_id' => ['required', Rule::exists('tags','id')]                        
        ]); 
    }   */
}
