@extends('layouts.admin');
@section('content')
<h2>Edit Post</h2>
<form method="post" action="{{route('admin.tags.update',['id'=>$tag->id] ) }}" enctype="multipart/form-data">
    
<input type="hidden" name="_method" value="PUT">
{{csrf_field()}}
<div class="form-group">
    <label class="control-label">Tag </label>
    <div>
        <input type="text" name="tag" id="tag" class="form-control" value="{{$tag->tag}}">
    </div>
</div>

   <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection