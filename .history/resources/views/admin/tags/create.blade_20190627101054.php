@extends('layouts.admin');
@section('content')
<h2>New Post</h2>
<!-- @if ($errors->any())
<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif -->
<form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
{{csrf_field()}}
<div class="form-group">
    <label class="control-label">Tiltle </label>
        <input type="text" name="title" id="title" value="{{ old('title')}}" class="col-7 form-control @error('title') is-invalid @enderror">
			 
    </div>
<div class="form-group">
    <label class="control-label">Content </label>
    
<textarea name="content" id="content" class="col-7 form-control @error('content') is-invalid @enderror" >{{ old('content') }}</textarea>
			 
 </div>
 <div class="form-group">
    <label class="control-label">Image </label>
    
<input type="file" name="image" id="image" value="{{ old('image') }}" class="col-7 form-control @error('image') is-invalid @enderror" >
			 
 </div>
 <div class="form-group">
   
 <label for="category"> Category:
</label>
    @foreach($categories as $category)
  
<div class="form-check">
  <input class="form-check-input" type="checkbox"  id="category_id" name="category_id[]" value="{{$category->id}}" > {{$category->title}}
 
</div>
    
    @endforeach 
</div>
<div class="form-group">
<label for="status"> Status:
</label>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status"  value="Published" > Published
 
</div>
<div class="form-check">
  <input class="form-check-input" type="radio"name="status" value="Draft" > Draft
  
</div>
</div>





   <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection


