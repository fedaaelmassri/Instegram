<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function index(){
return  view('admin.posts.index',[
      'posts'=>Post::all(),
]);
    }
    public function create(){
        return  view('admin.posts.create');
    }
    public function store(R){
        return __METHOD__;
  
    }
    public function edit($id){
        $post=Post::findorFail($id);
        return  view('admin.posts.edit',[
            'posts'=>$post,
        ]);   
    }
    public function delete(){
        return __METHOD__;
  
    }
    
}
