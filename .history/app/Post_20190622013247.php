<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    
    public function setPostStatusAttribute($value)//Mettors (status) يصبح (post_status)    اسم حقل 
    {
        return  ucfirst($this->post_status);
    }
    public function getStatusAttribute()//Accessor (status) يصبح (post_status)    اسم حقل 
    {
        return  ucfirst($this->post_status);
    }
    public function Categories()
    {
        return $this->belongsToMany(Category::class,'category_posts');
    }
}