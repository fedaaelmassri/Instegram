@extends('layouts.admin');
@section('content')
<h2>New Post</h2>

<form method="post" action="{{ route('admin.posts.store') }}">
{{csrf_field()}}
<div class="form-group">
    <label class="control-label">Tiltle </label>
        <input type="text" name="title" id="title" value="{{ old('title')}}" class="form-control @error('title') is-invalid @enderror">
		
    </div>
</div>
<div class="form-group">
    <label class="control-label">Content </label>
    
<textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="3">{{ old('content') }}</textarea>
			
 </div>
   <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection