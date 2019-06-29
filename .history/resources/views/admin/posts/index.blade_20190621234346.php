@extends('layouts.admin');
@section('content')
<a class="btn bn-primary" href="{{route('admin.posts.create')}}">Add Post</a>||
<a href="{{route('admin.posts.trashed')}}">Trashed Post</a>

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
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    </thead>
        <tbody>
            @foreach($posts as $post)
        <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->status}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>
        <td class="text-center"><a href="{{route('admin.posts.edit',['id'=>$post->id])}}" class="btn btn-primary">edit</a>
        </td>
          <td class="text-center">
        <form method="post" action="{{route('admin.posts.delete',['id'=>$post->id])}}">
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