<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;


class TagController extends Controller
{
    public function index()
    {

        return view('admin.tags.index', [
            'tags' => Tag::paginate(),
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
       
         $tag=new tag();
         $tag->tag=$request->input('tag');
         $tag->save();
         return redirect(route('admin.tags'))->with(
            'message',sprintf('tag "%s" Created!',$tag->tag)
        );
       
     }
     public function edit($id){
         $tag=tag::findOrFail($id);
         return  view('admin.tags.edit',[
             'tag'=>$tag,
             'id'=>$id,
           //  'tags'=>tag::all()->load('Categories'),
 
         ]);   
     }
     public function update(Request $request,$id){
         $tag=tag::findorFail($id);
        
         $tag->tag=$request->input('tag');
         $tag->save();
       
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
