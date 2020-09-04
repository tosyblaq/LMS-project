<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FrontEndSecondParagraph extends Model
{
    protected $guarded = [];

    //function to delete image
    public function deleteImage()
    {
        return Storage::delete($this->image);
    }
}
