<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // relation between user and post so any post belongs to one user and 1 user has many posts

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
