<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Category;

class AccountOrder extends Model
{
    protected $guarded = [];

    // relationship between AcountOrder and User model
    //order belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship between order and category
    // an order has Many categories
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
