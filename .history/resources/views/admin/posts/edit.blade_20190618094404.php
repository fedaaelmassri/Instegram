extends('layouts.admin');
@section('content')
<h2>Edit Post</h2>
<form method="post" action="{{route('admin.posts.update',['id'=>$post->id])}}">
    @csrf
<div class="form-group">
    <lable class="control-label">Tiltle </lable>
    <div>
        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
    </div>
</div>
<div class="form-group">
    <lable class="control-label">Content </lable>
    <div>
<textarea name="content" id="content" cols="30" rows="6" class="form-control" >{{$post->contet}}</textarea> 
   </div>
   <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection