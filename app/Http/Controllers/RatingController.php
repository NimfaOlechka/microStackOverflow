<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Answer;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //
    public function voteUp(Answer $answer)
    {      
        //validate
        //$id = auth()->user()->id;
        request()->validate([
            'answer_id' => 'required'
        ]);
        $rating = new Rating();
        $rating->answer_id = $answer->id();
        $rating->user_id = auth()->user()->id;
        $rating->vote = 1;

        $rating->save();
            
        return back();
    }

    public function voteDown(Answer $answer)
    {        
        //validate
        request()->validate([
            'answer_id' => 'required'
        ]);

        Rating::create([
            'answer_id' => request('answer_id'),
            'user_id' => request(auth()->id),
            'vote' => 0
        ]);
    }
}
