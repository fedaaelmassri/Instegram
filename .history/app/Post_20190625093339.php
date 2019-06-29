<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected static function boot(){
    parent::boot();
    static::addGlobalScope('published',function($query));
    }
    public function scopePublished($query){
        $query->where('post_status','published');
       // $query->orderby('created_at','DESC');
        return $query;
    }
    public function scopeDraft($query){
        $query->where('post_status','draft');
        $query->orderby('created_at','DESC');
        return $query;
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
