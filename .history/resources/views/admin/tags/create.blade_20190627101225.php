@extends('layouts.admin');
@section('content')
<h2>New Tag</h2>
<!-- @if ($errors->any())
<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif -->
<form method="post" action="{{ route('admin.tags.store') }}" enctype="multipart/form-data">
{{csrf_field()}}
<div class="form-group">
    <label class="control-label">Tags </label>
        <input type="text" name="tag" id="tag" value="{{ old('tag')}}" class="col-7 form-control @error('tag') is-invalid @enderror">
			 
    </div>
 
 





   <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection


