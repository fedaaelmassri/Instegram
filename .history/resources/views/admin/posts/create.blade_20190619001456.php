@extends('layouts.admin');
@section('content')
<h2>New Post</h2>
 
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif
<form method="post" action="{{ route('admin.posts.store') }}">
{{csrf_field()}}
<div class="form-group">
    <label class="control-label">Tiltle </label>
        <input type="text" name="title" id="title" value="{{ old('title')}}" class="form-control @error('title') is-invalid @enderror">
			@error('title')
			<p class="text-danger">{{ $message->embed  }}</p>
			@enderror
    </div>
</div>
<div class="form-group">
    <label class="control-label">Content </label>
    <div>
<textarea name="content" id="content" cols="30" rows="6" class="form-control @error('content') is-invalid @enderror" rows="6">{{ old('content') }}</textarea>
			@error('content')
			<p class="text-danger">{{ $message->embed  }}</p>
			@enderror
 </div>
   <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection