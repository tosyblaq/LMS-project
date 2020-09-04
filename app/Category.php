<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use App\Course;
use App\AccountOrder;

class Category extends Model
{
    protected $guarded = [];

    //relationship between category and course
    //category hasMany To courses
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    //function to delete image
    public function deleteImage()
    {
        return Storage::delete($this->image);
    }

    public function cartItem($id)
    {
        $cart->search(function ($cartItem, $rowId){
            return $cartItem->id === $id;
        });
    }

    // relationship between Category and AccountOrder model
    //category belongs to an order
    public function order()
    {
        return $this->belongsTo(AccountOrder::class);
    }

}


