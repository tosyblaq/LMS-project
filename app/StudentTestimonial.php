<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTestimonial extends Model
{
    protected $guarded = [];

    //relationship between student testimonial and user
    //testimonial belongsTo a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
