<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postStat extends Model
{
    //
    public function views()
    {
        return $this->beongsTo(Post::class);
    }

}
