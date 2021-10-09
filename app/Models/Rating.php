<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [        
        'user_id',
        'answer_id',
        'vote'
    ];

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
