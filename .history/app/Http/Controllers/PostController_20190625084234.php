<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index(){
      
            return view ('posts.index')->with([
                'posts'=> Post::where('post_status','published')->orderby('created_at','DESC')->get(),
                'title'=>'<h2>Titlle</h2>'
                    ]);
                }
    public function view($id){
                    $post=Post::find($id)->where('post_status','published')->get();
                    if(!$post){
                            abort(404);
                        }
                    
                        return view('posts.view',[
                            'post' => $post,
                        ]);
                    
                }
}
