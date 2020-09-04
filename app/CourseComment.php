<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Course;

class CourseComment extends Model
{
    protected $guarded = [];

    //relationship between a comment and a user
    //comment belongsTo a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relationship between a comment and a course
    //comment belongsTo a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
