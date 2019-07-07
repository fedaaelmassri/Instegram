@extends('layouts.default')

@section('title', $post->title)


@section('content')

<article class="post">
	<header>
		<div class="title">
			<h2><a href="#">{{ $post->title }}</a></h2>
			<p>{{ $post->content }}</p>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-11-01">{{ $post->created_at }}</time>
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/avatar.jpg') }}" alt="" /></a>
		</div>
	</header>
	<span class="image featured"><img src="{{ asset('storage/'.$post->image)}}" alt="" /></span>
	{{ $post->content }}
	<footer>
		<ul class="stats">
			<li><a href="#">General</a></li>
			<li><a href="#" class="icon solid fa-heart">28</a></li>
			<li><a href="#" class="icon solid fa-comment">128</a></li>
		</ul>
	</footer>
</article>

@endsection
