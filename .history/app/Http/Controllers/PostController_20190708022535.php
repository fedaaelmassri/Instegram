<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use DB;


class PostController extends Controller
{
    //
    public function index($cat=null,$id=null){
        $postofcategory=null;
        $cat=null;
        $category=null;
        $catid=null;
       if($id!=null){
        //$category=Category::findOrFail($id);
        $postofcategory= $category->posts->pluck('id')->toArray();
        $cat=$cat;
        $catid=$id;
    }
    //$dd=Category::with(['posts'])->where('id','=',$id)->get();
        //dd($catid);
            return view ('posts.headline')->with([
              'categories','tags','stat',
                'posts'=> Post::withoutGlobalScope('published')->latest()->take(4)->get(),
                 'categories'=> Category::all(),
                 'tags'=>Tag::all(),
                  'postofcategory'=>Category::with(['posts'])->where('id','=',$id)->get(),
                'catid'=>$catid,
                'cat'=>$cat,
                'mostpopular'=>Post::withoutGlobalScope('published')->orderBy('views', 'desc')->latest()->take(5)->get(),
                'title'=>'<h2>Titlle</h2>'
                    ]);
                  // return($dd);

                }
               
                // public function featurepost(){
                //     return view ('posts.featurepost')->with(['categories','tags','stat',
                //         'posts'=> Post::withoutGlobalScope('published')->latest()
                //         ->take(4)->get(),
                //   'title'=>'<h2>Titlle</h2>'
                //             ]);
                        
                // }
                  public function  post_category($id)
                  {

                 // 'cat'=>$cat,
                    $cat = Category::with(['posts'])-find($id);
            
                    if (!$cat) {
                      abort(404);
                    }
                      
                    return view('posts.category', [

                      'posts'=> Post::withoutGlobalScope('published')->latest()->take(4)->get(),
                   'categories'=> Category::all(),
                   'tags'=>Tag::all(),
                    'postofcategory'=>$cat,
                  //'catid'=>$catid,
                 // 'cat'=>$cat,
                  'mostpopular'=>Post::withoutGlobalScope('published')->orderBy('views', 'desc')->latest()->take(5)->get(),
                  'title'=>'<h2>Titlle</h2>'
                    ]);
                  }  
                public function view($id)
                {
                    
                    $post = Post::published()->find($id);
            
                  if (!$post) {
                    abort(404);
                  }
                    
                    $stat = Post::updateOrCreate([
                        'id' => $post->id,
                    ], [
                        'views' => DB::raw('views + 1'),
                    ]);            
                  return view('posts.view', [
                    'post' => $post,
                    'posts'=> Post::withoutGlobalScope('published')->latest()->take(4)->get(),
                 'categories'=> Category::all(),
                 'tags'=>Tag::all(),
                  'postofcategory'=>Category::with(['posts'])->where('id','=',$id)->get(),
                //'catid'=>$catid,
               // 'cat'=>$cat,
                'mostpopular'=>Post::withoutGlobalScope('published')->orderBy('views', 'desc')->latest()->take(5)->get(),
                'title'=>'<h2>Titlle</h2>'
                  ]);
                }
}
