@extends('layouts.default')

@section('title', 'Posts')

@section('content')
	
	@foreach($posts as $post)
	
	<article class="post">
		<header>
			<div class="title">
				<h2><a href="{{ route('posts.view', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
				<p>{{ $post->content }}</p>
			</div>
			<div class="meta">
				<time class="published" datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
				<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/avatar.jpg') }}" alt="" /></a>
			</div>
		</header>
		<a href="single.html" class="image featured"><img src="{{ asset('storage/'.$post->image) }}" alt="" /></a>
		<p>{{ $post->content }}</p>
		<footer>
			<ul class="actions">
				<li><a href="{{ route('posts.view', ['id' => $post->id]) }}" class="button large">Continue Reading</a></li>
			</ul>
			<ul class="stats">
				<li><a href="#">General</a></li>
				<li><a href="#" class="icon solid fa-heart">28</a></li>
				<li><a href="#" class="icon solid fa-comment">128</a></li>
			</ul>
		</footer>
	</article>
	@endforeach

@endsection
