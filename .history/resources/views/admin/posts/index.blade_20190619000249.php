@extends('layouts.admin');
@section('content')
<a href="{{route('admin.posts.create')}}">Add Post</a>
if (session('message'))
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
        <th>Created At</th>
        <th>Action</th>
    </tr>
    </thead>
        <tbody>
            @foreach($posts as $post)
        <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>
        <td><a href="{{route('admin.posts.edit',['id'=>$post->id])}}" class="btn btn-primary">edit</a>
         
        <form method="post" action="{{route('admin.posts.delete',['id'=>$post->id])}}">
{{csrf_field()}}
         <button type="submit" class="btn btn-danger">Delete</button>   
         @method('DELETE')
        </form>
    </td>
        </tr>  
        @endforeach 
    </tbody>
</table>
@endsection