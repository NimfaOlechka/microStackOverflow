<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    //protected $with = ['tags', 'author', 'answers'];       

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}