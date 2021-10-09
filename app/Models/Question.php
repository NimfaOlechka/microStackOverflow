<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'user_id',
        'tag_id',
        'thumbnail'
    ];
    protected $with = ['tags', 'author', 'answers'];       

    public function tags()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
     public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    /*
    public function comments()
    {
        return $this->hasMany(Comment::class);
    } */
}
