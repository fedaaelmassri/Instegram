<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        //         return view ('posts.index')->with([
        //  'posts'=> $this->posts,
        //  'title'=>'<h2>Titlle</h2>'
        //         ]);
        return view ('posts.index')->with([
            'posts'=> Post::all(),
            'title'=>'<h2>Titlle</h2>'
                   ]);
        // return view ('layouts.defult');
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
