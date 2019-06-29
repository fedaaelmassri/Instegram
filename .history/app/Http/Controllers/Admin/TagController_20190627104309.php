<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Tag;


class TagController extends Controller
{
    public function index(){
        $tag= request()->query('tag','');
 
 //return  view('admin.tags.index',[
    // 'tags'=>tag::withTrashed()->get(),//ترجع البيانات كلهم المحذوف والغير محذوف
     //  'tags'=>tag::all()->load('Categories'),
    // 'tags'=>tag::orderBy('created_at','DESC')->get()->load('Categories'),
    // $tags=tag::withoutGlobalScope('published')
     // ->where('tag','LIKE'.'%'.$tag.'%')
     // ->where('tag_status','=',$status)
     // $tags=tag::whereRaw('(select count(*) from category_tags  where
     // category_tags.tag_id=tag.id and category.id=? )'>0)
     // ->select('tags.*', 'tag_category.category_id as category_id')
     //  DB::table('tag')
     // ->select(DB::raw('count(*) as user_count, status'))
     //  ->where('status', '<>', 1)
     // ->groupBy('status')
     // ->get()
     $tags=Tag::when($tag,function($query,$tag){
       return $query->where('tag','LIKE'.'%'.$tag.'%');
 
     })
       
     ->orderBy('created_at','DESC')->paginate(4);
 
 //]);
 return  view('admin.tags.index',[
     'tags'=>$tags,
      'tag'=>$tag,
      
 
    ]);
 }
     public function trashed(){
         return  view('admin.tags.trashed',[
             'tags'=>tag::onlyTrashed()->get(),//ترجع البيانات فقط المحذوفة
              // 'tags'=>tag::all(),
         ]);
     }
 
     public function forceDelete($id){
         $tag=Tag::onlyTrashed()->where('id',$id)->first();
         //$tag=tag::findOrFail()->where('id',$id);
         $tag->forceDelete();//تحذف نهائيا من قاعدة البيانات
         return redirect( route('admin.tags.trashed') )
         ->with('message', sprintf('tag "%s" Deleted!', $tag->tag));
 
     }
     public function restore(Request $request,$id){
         $tag=tag::onlyTrashed()->where('id',$id)->first();
         //$tag=tag::findOrFail()->where('id',$id);
         $tag->restore();//ترجع المحذوف تجعله غير محذوف
         return redirect( route('admin.tags') )
         ->with('message', sprintf('tag "%s" Restore!', $tag->tag));
 
     }
     public function create(){
         return  view('admin.tags.create');
     }
     public function store(Request $request){
         // $request->validate([
         //     'tag'=>'required|max:255|min:10',
         //     'content'=>'required',
             //   'image' =>'required|image'
         // ]);
       $image=$request->file('image');
        $path= $image->store('images','public');//->storeAs('images','image.jpg');
         $tag=new tag();
         $tag->tag=$request->input('tag');
         $tag->content=$request->input('content');
         $tag->image=$request->input('image');
         $tag->image=$path;
         $tag->tag_status=$request->input('status');
         $tag->save();
        $category=$request->input('category_id');
      foreach($category as $cat){
         $category_tag=new category_tag();
         $category_tag->category_id=$cat;
         $category_tag->tag_id=$tag->id;
         $category_tag->save();
      }
         return redirect( route('admin.tags') )
         ->with('message', sprintf('tag "%s" created!', $tag->tag));
 
   
     }
     public function edit($id){
         $tag=tag::findOrFail($id)->load('Categories');
         return  view('admin.tags.edit',[
             'tag'=>$tag,
             'id'=>$id,
             'categories'=>Category::all(),
           //  'tags'=>tag::all()->load('Categories'),
 
         ]);   
     }
     public function update(Request $request,$id){
         $tag=tag::findorFail($id);
         $image=$request->file('image');
         if($image && $image->isValid()){//تفحص اذا الملف مرفوع ام لا
        $path= $image->storeAs('images',basename($tag->image),'public');//->storeAs('images','image.jpg');
        $tag->image=$path;}
         $tag->tag=$request->input('tag');
         $tag->content=$request->input('content');
         $tag->tag_status=$request->input('status');
         $tag->save();
        $category=$request->input('category_id');
      
         foreach($category as $cat){
      $category_tag=category_tag::findMany('tag_id',$id);
      //->update(['category_id'=>$cat,'tag_id'=>$tag->id]);
 
     //    $category_tag=new category_tag();
         $category_tag->category_id=$cat;
         $category_tag->tag_id=$tag->id;
         $category_tag->save();
      }
         return redirect(route('admin.tags'))->with(
             'message',sprintf('tag "%s" updated!',$tag->tag)
         );
   
     }
     public function delete($id){
         $tag=tag::findorFail($id);
         $tag->delete();
         return redirect(route('admin.tags'))->with(
             'message',sprintf('tag "%s" deleted!',$tag->tag)
         );
 
     }
}
