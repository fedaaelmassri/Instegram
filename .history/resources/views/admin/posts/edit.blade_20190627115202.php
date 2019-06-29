@extends('layouts.admin');
@section('content')
<h2>Edit Post</h2>
<form method="post" action="{{route('admin.posts.update',['id'=>$post->id] ) }}" enctype="multipart/form-data">
    
<input type="hidden" name="_method" value="PUT">
{{csrf_field()}}
<div class="form-group">
    <label class="control-label">Tiltle </label>
    <div>
        <input type="text" name="title" id="title" class="form-control"  value="{{old('title',$post->title)}}">
    </div>
</div>
<div class="form-group">
    <label class="control-label">Content </label>
    <div>
<textarea name="content" id="content" cols="30" rows="6" class="form-control" >{{old('content',$post->content)}}</textarea> 
   </div>
   <div class="form-group">
    <label class="control-label">Image </label>
    
<input type="file" name="image" id="image" value="{{$post->image}}" class="col-7 form-control @error('image') is-invalid @enderror" >
 </div>
   <div>
   <img src="{{asset('storage/'.$post->image)}}" height="100" />
   </div>
   <div class="form-group">
   
   <label for="category"> Category:
  </label>
      @foreach($categories as $category)
    
  <div class="form-check">
    <input class="form-check-input" type="checkbox"  id="category_id" name="category_id[]" value="{{$category->id}}" 

  @if($post->categories->contains($category->id) )
     checked
  @endif
   > {{$category->title}}
   
  </div>
      
      @endforeach 
  </div>
  <div class="form-group">
  <label for="status"> Status:
  </label>
  <div class="form-check">
  
    <input class="form-check-input" type="radio" name="status"  value="Published"  {{ old( 'status' , $post->post_status) == 'published' ? 'checked' : ' '}} > Published
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status" value="Draft" {{ old( 'status' , $post->post_status) == 'draft' ?  'checked ': ' '}}  > Draft
    
  </div>
  
  </div>
  <div class="form-group">
   
   <label for="tag_id"> Tag:
  </label>
      @foreach($tags as $tag)
    
  <div class="form-check">
    <input class="form-check-input" type="checkbox"  id="tag_id" name="tag_id[]" value="{{$tag->id}}" 

  @if($post->tags->contains($tag->id) )
     checked
  @endif
   > {{$tags->tag}}
   
  </div>
      
      @endforeach 
  </div>
  
   <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection