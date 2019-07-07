@extends('layouts.default')

@section('title', "posts")


@section('headline')

                @foreach($posts as $post)

                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    {{ $post->title }}
					</span>
					
					@endforeach


		

@endsection
