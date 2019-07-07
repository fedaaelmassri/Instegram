<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postStat extends Model
{
    //
    public $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = 'post_id';

    protected $guarded = [];

    public function post()
    {
        return $this->beongsTo(Post::class);
    }

}
