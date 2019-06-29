@extends('layouts.admin');
@section('content')
<a href="{{route('admin.posts.create')}}">Add Post</a>
@csrf
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
        <td><a href="{{route('admin.posts.edit',['id'=>$post->id])}}">edit</a> |
        <button action="{{route('admin.posts.delete',['id'=>$post->id])}}">Delete</button>
    </td>
        </tr>  
        @endforeach 
    </tbody>
</table>
@endsection