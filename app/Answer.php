<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Answer extends Model
{
    protected $guarded = [];

    //relationship btw Answer and User Model
    // Answer belongsTo a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relationship btw Answer and Question Model
    // Answer belongsTo a Question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
