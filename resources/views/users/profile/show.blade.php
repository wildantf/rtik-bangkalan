@extends('dashboard.layouts.main')
@section('content')
    <div class="text-white">
        <h1>{{ $user->name }}</h1>
        <h1>{{ $user->email }}</h1>
        <h1>{{ $user->motto }}</h1>
        <h1>{{ $user->name }}</h1>
    </div>
    <a href="/profiles/{{ $user->username }}/edit"> Edit</a>
@endsection