<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    public function scopePublished($query){
        $query->where
    }
    
    public function setPostStatusAttribute($value)//Mutators  
    {
        return  $this->attributes['post_status']=strtolower($value);
    }
    public function getStatusAttribute()//Accessor (status) يصبح (post_status)    اسم حقل 
    {
        return  ucfirst($this->post_status);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_posts');
    }
}
