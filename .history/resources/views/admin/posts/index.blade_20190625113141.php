@extends('layouts.admin');
@section('content')
<div style="padding:15px;">
<a class="btn btn-primary" style="margin-right:5px;"  href="{{route('admin.posts.create')}}">Add Post</a>||
<a  class="btn btn-danger" style="margin-left:5px;"  href="{{route('admin.posts.trashed')}}">Trashed Post</a>
</div>
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
<form method="get" action="{{route('admin.posts')}}" class="form-inline mb-5 mt-5 ">
<input type="text" name="title" id="title" placeholder="Serch Title..." class="form-control">
<select name="status" id="status" class="form-control ml-1">
<option value="">All Status</option>
<option value="published">Published</option>
<option value="draft">Draft</option>
</select>
<select name="category_id"  class="form-control ml-1">
<option value="">All Category</option>
@foreach(App\Category::all as $category)
<option value="{{$category->id}}">{{}}</option>
</select>
<button type="submit"   class="btn btn-outline-info ml-1 " >Search</button>
</form>

<table class="table">
    <thead >
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
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
        <td > @foreach($post->categories as $category) {{$category->title}}<br/> @endforeach</td>
        <td>{{$post->status}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>
        <td class="text-center"><a href="{{route('admin.posts.edit',['id'=>$post->id])}}" style="color:white;" class="btn btn-warning">Edit</a>
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
{{$posts->links()}}

@endsection