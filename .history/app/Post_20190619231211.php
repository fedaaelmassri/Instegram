<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function Categor()
    {
        return $this->belongsToMany('App\Post');
    }
}
