<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $with = ['rating']; 


    
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    
}
