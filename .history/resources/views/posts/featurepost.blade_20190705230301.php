@extends('layouts.default')

@section('title', "posts")


@section('featurepost')


                <div class="row m-rl--1">
                @foreach ($posts as $post)
			<h1>{{ $post->id }}</h1>
			</div>
					


		

@endsection
