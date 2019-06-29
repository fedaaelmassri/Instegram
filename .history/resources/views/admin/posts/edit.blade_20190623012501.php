@extends('layouts.admin');
@section('content')
<h2>Edit Post</h2>
<form method="post" action="{{route('admin.posts.update',['id'=>$post->id] ) }}" enctype="multipart/form-data">
    
<input type="hidden" name="_method" value="PUT">
{{csrf_field()}}
<div class="form-group">
    <label class="control-label">Tiltle </label>
    <div>
        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
    </div>
</div>
<div class="form-group">
    <label class="control-label">Content </label>
    <div>
<textarea name="content" id="content" cols="30" rows="6" class="form-control" >{{$post->content}}</textarea> 
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
    <input class="form-check-input" type="checkbox"  id="category_id" name="category_id[]" value="{{$category->id}}"  @foreach($post->categories as $category) {{$category->title}}<br/> @endforeach @if($post->categories->category_id==$category->id) checked
  @endif > {{$category->title}}
   
  </div>
      
      @endforeach 
  </div>
  <div class="form-group">
  <label for="status"> Status:
  </label>
  <div class="form-check">
     
    <input class="form-check-input" type="radio" name="status"  value="Published"  @if($post->post_status=='published') checked
  @endif> Published
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio"name="status" value="Draft" @if($post->post_status=='draft') checked
  @endif > Draft
    
  </div>
  </div>
  
  
   <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection