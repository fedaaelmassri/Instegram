<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table='post_tag';
    public $timesstamp = false;
    protected $fillable=['post_id','tag_id'];
    //
}
