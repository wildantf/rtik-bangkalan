@extends('layouts.main')
@section('container')

@foreach($posts as $post)
<div class="card mt-3">
  <h5 class="card-header">{{ $post->name}}</h5>
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ $post->excerpt}}</p>
    <a href="posts/{{$post->slug}}">Read more>></a>
  </div>
</div>
@endforeach
@endsection
