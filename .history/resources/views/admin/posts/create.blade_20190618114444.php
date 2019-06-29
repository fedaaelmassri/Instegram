@extends('layouts.admin');
@section('content')
<h2>New Post</h2>
@if($errors)
<div class="alert alert-danger">
 <ul>

@foreach($errors as $error)
<li>{{$error}}</li>
@endforeach
 </ul>
</div>
@endif
<form method="post" action="{{ route('admin.posts.store') }}">
{{csrf_field()}}
<div class="form-group">
    <label class="control-label">Tiltle </label>
    <div>
        <input type="text" name="title" id="title" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="control-label">Content </label>
    <div>
<textarea name="content" id="content" cols="30" rows="6" class="form-control" ></textarea> 
   </div>
   <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection