extends('layouts.admin');
@section('content')
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
        <td><a href="{{rout('admin.posts.edit,['id'=>$post->id]')}}"></a>Delete</td>
        </tr>  
        @endforeach 
    </tbody>
</table>
@endsection