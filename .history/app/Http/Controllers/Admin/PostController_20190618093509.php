<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Post;

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
    public function store(Request $request){
        $post=new Post();
        $post->title=$request->input('title');
        $post->content=$request->input('title');
        return __METHOD__;
  
    }
    public function edit($id){
        $post=Post::findorFail($id);
        return  view('admin.posts.edit',[
            'posts'=>$post,
        ]);   
    }
    public function update(Request $request,$id){
        $post=Post::findorFail($id);

        return __METHOD__;
  
    }
    public function delete($id){
        $post=Post::findorFail($id);
        $post->delete();
        return __METHOD__;

    }
    
}
