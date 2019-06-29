@extends('layouts.admin');
@section('content')
<!-- <div style="padding:15px;">
<a class="btn btn-primary" style="margin-right:5px;"  href="{{route('admin.posts.create')}}">Add Post</a>||
<a  class="btn btn-danger" style="margin-left:5px;"  href="{{route('admin.posts.trashed')}}">Trashed Post</a>
</div> -->
<!-- @if (session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
@endif -->

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
<form method="get" action="{{route('admin.tags')}}" class="form-inline mb-5 mt-5 ">
<input type="text" name="tag" id="tag" placeholder="Serch Tag..." class="form-control">
<button type="submit"   class="btn btn-outline-info ml-1 " >Search</button>
</form>

<table class="table">
    <thead >
    <tr>
        <th>ID</th>
        <th>Tag</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    </thead>
        <tbody>
            @foreach($tags as $tag)
        <tr>
        <td>{{$tag->id}}</td>
        <td>{{$tag->tag}}</td>
        <td>{{$tag->created_at}}</td>
        <td>{{$tag->updated_at}}</td>
        <td class="text-center"><a href="{{route('admin.tags.edit',['id'=>$tag->id])}}" style="color:white;" class="btn btn-warning">Edit</a>
        </td>
          <td class="text-center">
        <form method="post" action="{{route('admin.tags.delete',['id'=>$tag->id])}}">
{{csrf_field()}}
         <input type="hidden" name="_method" value="DELETE"> 
         <button type="submit" class="btn btn-danger">Delete</button>   

        </form>
    </td>
        </tr>  
        @endforeach 
    </tbody>
</table>
{{$tags->links()}}

@endsection