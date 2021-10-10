@extends('layouts.main')

@section('container')

<h1 class="mb-5">Post Category : </h1>
@foreach($categories as $category)
<article>
    <h1><a href="/posts?category={{$category->slug}}">{{$category->name}}</a></h1>
</article>
@endforeach
<a href="/posts"> Back </a>
@endsection