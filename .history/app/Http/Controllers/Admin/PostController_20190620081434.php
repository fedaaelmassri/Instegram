<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\category_post;

class PostController extends Controller
{
    //
    public function index(){
return  view('admin.posts.index',[
      'posts'=>Post::all(),
]);
    }
    public function create(){
        return  view('admin.posts.create',[
            'categories'=>Category::all(),

        ]);
    }
    public function store(Request $request){
        // $request->validate([
        //     'title'=>'required|max:255|min:10',
        //     'content'=>'required'
        // ]);
        $post=new Post();
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->image='img.jpg';
        $category_post=new 
        $post->save();
        return redirect( route('admin.posts') )
        ->with('message', sprintf('Post "%s" created!', $post->title));

  
    }
    public function edit($id){
        $post=Post::findOrFail($id);
        return  view('admin.posts.edit',[
            'post'=>$post,
            'id'=>$id,
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
