<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;
use App\User;
use App\Lesson;
use App\CourseComment;
use App\Question;

use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    protected $guarded = [];

    //relationship between course and user
    //course belongs To user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relationship between course and category
    //course belongs To category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //relationship between course and lesson
    //course hasMany lessons
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    //relationship between course and comment
    //course hasMany comments
    public function comments()
    {
        return $this->hasMany(CourseComment::class);
    }

    //deleting image
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    //deleting video
    public function deleteVideo()
    {
        Storage::delete($this->intro_video);
    }

    //relationship btw Course and Question Model
    // Course hasMany Question
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
