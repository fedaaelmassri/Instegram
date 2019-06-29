<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
