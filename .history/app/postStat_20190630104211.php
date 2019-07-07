<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postStat extends Model
{
    //
    public function stat()
    {
        return $this->hasOne(Post::class);
    }

}
