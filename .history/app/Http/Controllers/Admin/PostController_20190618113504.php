<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

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
        $request->validate([
            'title'=>''
        ]);
        $post=new Post();
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->image='img.jpg';
        $post->save();
        return redirect( route('admin.posts'))->with(
            'message',sprintf('Post "%s" created!',$post->title) );
  
    }
    public function edit($id){
        $post=Post::findorFail($id);
        return  view('admin.posts.edit',[
            'post'=>$post,
        ]);   
    }
    public function update(Request $request,$id){
        $post=Post::findorFail($id);
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->image='img.jpg';
        $post->save();
        return redirect(route('admin.posts'))->with(
            'message',sprintf('Post "%s" updated!',$post->title)
        );
  
    }
    public function delete($id){
        $post=Post::findorFail($id);
        $post->delete();
        return redirect(route('admin.posts'))->with(
            'message',sprintf('Post "%s" deleted!',$post->title)
        );

    }
    
}
