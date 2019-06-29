<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index(){
      
            return view ('posts.index')->with([
                'posts'=> Post::all(),
                'title'=>'<h2>Titlle</h2>'
                    ]);
                }
    public function view($id){
                    $post=Post::find($id);
                    if(!$post){
                            abort(404);
                        }
                    
                        return view('posts.view',[
                            'post' => $post,
                        ]);
                    
                }
}
