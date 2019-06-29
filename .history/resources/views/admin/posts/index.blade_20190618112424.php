@extends('layouts.admin');
@section('content')
<a href="{{route('admin.posts.create')}}">Add Post</a>
@if(@session('message'))
<div class="alert alert-success">
{{@session('message')}}
</div>
@endif
@component
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
        <input type="hidden" name="_method" value="PUT">
{{csrf_field()}}
         <button type="submit" class="btn btn-danger">Delete</button>   
        </form>
    </td>
        </tr>  
        @endforeach 
    </tbody>
</table>
@endsection