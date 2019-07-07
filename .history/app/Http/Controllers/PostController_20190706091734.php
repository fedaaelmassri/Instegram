<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    //
    public function index($id=null){
      
        $category=Category::findOrFail($id);
        $postofcategory= $category->posts->pluck('id')->toArray();

            return view ('posts.headline')->with([
              'categories','tags','stat',
                // 'posts'=> Post::where('post_status','published')->latest()->get(),
                //'posts'=> Post::where('post_status','published')->orderby('created_at','DESC')->get(),
               // 'posts'=> Post::published()->latest()->get(),
                'posts'=> Post::withoutGlobalScope('published')->latest()
                //->paginate(3),
                // ->simplePaginate(3),
                ->take(4)->get(),
                'categories'=> Category::all(),
                'postofcategory'=>$postofcategory,
                'category'=>$category,
                'catid'=>$id,
               // $categories = $post->categories->pluck('id')->toArray();

                'title'=>'<h2>Titlle</h2>'
                    ]);
                }
               
                // public function featurepost(){
                //     return view ('posts.featurepost')->with(['categories','tags','stat',
                //         'posts'=> Post::withoutGlobalScope('published')->latest()
                //         ->take(4)->get(),
                //   'title'=>'<h2>Titlle</h2>'
                //             ]);
                        
                // }
    public function view($id){
                    //$post=Post::where('post_status','published')->find($id);
                    $post= Post::published()->find($id);

                    if(!$post){
                            abort(404);
                        }
                    
                        return view('posts.view',[
                            'post' => $post,
                        ]);
                    
                }
}
