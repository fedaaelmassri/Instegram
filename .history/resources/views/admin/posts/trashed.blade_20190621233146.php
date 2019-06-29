@extends('layouts.admin');
@section('content')
@if (session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
@endif

@if (session('message'))
	@component('components.alert')
		@slot('type', 'success')
	 	{{ session('message') }}
	@endcomponent
@endif

@if (session('error'))
	@component('components.alert')
		@slot('type', 'danger')
	 	{{ session('error') }}
	@endcomponent
@endif


<table class="table">
    <thead >
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Deleted At</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    </thead>
        <tbody>
            @foreach($posts as $post)
        <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->status}}</td>
        <td>{{$post->deleted_at}}</td>
        <td>
        <form method="post" action="{{route('admin.posts.restore',['id'=>$post->id])}}">
{{csrf_field()}}
<button class="btn btn-primary" type="submit">Restore</button>
</form>

<form method="post" action="{{route('admin.posts.forceDelete',['id'=>$post->id])}}">
{{csrf_field()}}

         <input type="hidden" name="_method" value="DELETE"> 
         <button type="submit" class="btn btn-danger">Delete</button>   

        </form>
    </td>
        </tr>  
        @endforeach 
    </tbody>
</table>
@endsection