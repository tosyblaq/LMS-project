<?php

namespace App;

use App\Lesson;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];

    //relationship between section and lesson
    //section hasMany lessons
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
