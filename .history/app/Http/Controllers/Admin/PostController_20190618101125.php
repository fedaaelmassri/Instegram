<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostController;

class PostController extends Controller
{
    //
    public function index(){
return  view('admin.posts.index',[
      'posts'=>PostController::all(),
]);
    }
    public function create(){
        return  view('admin.posts.create');
    }
    public function store(Request $request){
        $post=new PostController();
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->image='img.jpg';
        $post->save();
        return redirect( route('admin.posts') );
  
    }
    public function edit($id){
        $post=PostController::findorFail($id);
        return  view('admin.posts.edit',[
            'posts'=>$post,
        ]);   
    }
    public function update(Request $request,$id){
        $post=Post::findorFail($id);
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->image='img.jpg';
        $post->save();
        return redirect( route('admin.posts') );
  
    }
    public function delete($id){
        $post=Post::findorFail($id);
        $post->delete();
        return __METHOD__;

    }
    
}