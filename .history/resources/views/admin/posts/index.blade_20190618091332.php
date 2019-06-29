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
        <td>{{$post->}}</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>  
        @endforeach 
    </tbody>
</table>
@endsection