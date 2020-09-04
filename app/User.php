<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Profile;
use App\Course;
use App\CourseComment;
use App\StudentTestimonial;
use App\AccountOrder;

use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relationship between user and course
    //course belongs To user
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    //relationship between a user and a profile
    //user hasOne profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //deleting image
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    //relationship between a user and a comment
    //use hasMany comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //relationship between a user and a testimonial
    //user hasMany testimonials
    public function testimonials()
    {
        return $this->hasMany(StudentTestimonial::class);
    }

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    // relationship between User and AccountOrder model
    //User has Many order
    public function orders(){
        return $this->hasMany(AccountOrder::class);
    }

    //relationship between a user and a Question
    //user hasMany questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    //relationship between a user and a Answer
    //user hasMany answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
