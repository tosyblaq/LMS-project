<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Answer;
use App\Course;

class Question extends Model
{
    protected $guarded = [];

    //relationship btw Question and User Model
    // Question belongsTo a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relationship btw Question and Answer Model
    // Question hasMany Answer
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //relationship btw Question and Course Model
    // Question belongsTo a Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
