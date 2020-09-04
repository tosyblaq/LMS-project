<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class LiveTheExperience extends Model
{
    protected $guarded = [];

    //function to deleteImage
    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
