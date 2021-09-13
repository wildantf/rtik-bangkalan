@extends('layouts.main')

@section('container')

<h1 class="mb-5">Post Category : {{ $category }}</h1>
@foreach($posts as $post)
<article>
    <h1>{{ $post->title}}</h1>
    <p>By Wildan Tamma Faza Chair in {{ $post->category->name}}</p>
    <!-- AGAR TAGNYA TIDAK DI ESCAPE PHP -->
    {!! $post->body !!}
</article>
@endforeach
<a href="/posts"> Back </a>
@endsection