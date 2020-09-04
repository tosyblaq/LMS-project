<?php

namespace App;

use App\Section;
use App\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Lesson extends Model
{
    protected $guarded = [];

    //relationship between lesson and section
    //lessons belongsTo a section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    //relationship between lesson and course
    //lessons belongsTo a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    //deleting video
    public function deleteVideo()
    {
        Storage::delete($this->video_episode);
    }

}
