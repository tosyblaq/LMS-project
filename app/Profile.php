<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Profile extends Model
{
    protected $guarded = [];

    //relationship between a profile and a user
    //a profile belongsTo a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
