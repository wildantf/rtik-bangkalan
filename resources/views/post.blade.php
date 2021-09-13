@extends('layouts.main')

@section('container')

<article>
    <h1>{{ $post->title}}</h1>
    <p>By Wildan Tamma Faza Chair in <a href="/categories/{{ $post->category->slug}}">{{ $post->category->name}}</a></p>
    <!-- AGAR TAGNYA TIDAK DI ESCAPE PHP -->
    {!! $post->body !!}
</article>

<a href="/posts"> Back </a>
@endsection