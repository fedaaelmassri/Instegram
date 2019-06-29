<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\category_post;

class PostController extends Controller
{
   
    public function index(){
       $title= request()->query('title','');
       $status= request()->query('status','');
return  view('admin.posts.index',[
   // 'posts'=>Post::withTrashed()->get(),//ترجع البيانات كلهم المحذوف والغير محذوف
    //  'posts'=>Post::all()->load('Categories'),
   // 'posts'=>Post::orderBy('created_at','DESC')->get()->load('Categories'),
    'posts'=>Post::withoutGlobalScope('published')
    ->where('title','LIKE'.'%'.$title.'%')
    ->where('post_status','=',$status)
    ->when($title,function($query,$title){
      return $query->where('title','LIKE'.'%'.$title.'%');

    })
    ->when($status,function($query,$status){
        return $query->where('post_status','=',$status);
  
      })
    ->orderBy('created_at','DESC')->paginate(4),

]);
    }
    public function trashed(){
        return  view('admin.posts.trashed',[
            'posts'=>Post::onlyTrashed()->get(),//ترجع البيانات فقط المحذوفة
             // 'posts'=>Post::all(),
        ]);
    }

    public function forceDelete($id){
        $post=Post::onlyTrashed()->where('id',$id)->first();
        //$post=Post::findOrFail()->where('id',$id);
        $post->forceDelete();//تحذف نهائيا من قاعدة البيانات
        return redirect( route('admin.posts.trashed') )
        ->with('message', sprintf('Post "%s" Deleted!', $post->title));

    }
    public function restore(Request $request,$id){
        $post=Post::onlyTrashed()->where('id',$id)->first();
        //$post=Post::findOrFail()->where('id',$id);
        $post->restore();//ترجع المحذوف تجعله غير محذوف
        return redirect( route('admin.posts') )
        ->with('message', sprintf('Post "%s" Restore!', $post->title));

    }
    public function create(){
        return  view('admin.posts.create',[
            'categories'=>Category::all(),

        ]);
    }
    public function store(Request $request){
        // $request->validate([
        //     'title'=>'required|max:255|min:10',
        //     'content'=>'required',
            //   'image' =>'required|image'
        // ]);
      $image=$request->file('image');
       $path= $image->store('images','public');//->storeAs('images','image.jpg');
        $post=new Post();
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->image=$request->input('image');
        $post->image=$path;
        $post->post_status=$request->input('status');
        $post->save();
       $category=$request->input('category_id');
     foreach($category as $cat){
        $category_post=new category_post();
        $category_post->category_id=$cat;
        $category_post->post_id=$post->id;
        $category_post->save();
     }
        return redirect( route('admin.posts') )
        ->with('message', sprintf('Post "%s" created!', $post->title));

  
    }
    public function edit($id){
        $post=Post::findOrFail($id)->load('Categories');
        return  view('admin.posts.edit',[
            'post'=>$post,
            'id'=>$id,
            'categories'=>Category::all(),
          //  'posts'=>Post::all()->load('Categories'),

        ]);   
    }
    public function update(Request $request,$id){
        $post=Post::findorFail($id);
        $image=$request->file('image');
        if($image && $image->isValid()){//تفحص اذا الملف مرفوع ام لا
       $path= $image->storeAs('images',basename($post->image),'public');//->storeAs('images','image.jpg');
       $post->image=$path;}
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->post_status=$request->input('status');
        $post->save();
       $category=$request->input('category_id');
     
        foreach($category as $cat){
     $category_post=category_post::findMany('post_id',$id);
     //->update(['category_id'=>$cat,'post_id'=>$post->id]);

    //    $category_post=new category_post();
        $category_post->category_id=$cat;
        $category_post->post_id=$post->id;
        $category_post->save();
     }
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
