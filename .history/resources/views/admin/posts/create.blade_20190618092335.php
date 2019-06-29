extends('layouts.admin');
@section('content')
<h2>New Post</h2>
<form method="post" action="{{route(''admin.posts.store'')}}">
<div class="control-group">
    <lable class="control-label">Tiltle </lable>
    <div>
        <input type="text" name="title" id="title">
    </div>
</div>
</form>
@endsection