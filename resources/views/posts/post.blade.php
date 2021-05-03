@extends('layouts.layout')


@section('content')
    <h1>{{ $post->theme }}</h1>
    <hr>
    <p class="post"> {{ $post->body }} </p>
    <h6>Author of post: {{ $post->user->name }} </h6>
    <ul class="tags">
        <h4>Tags:</h4>
        @foreach ($post->tags as $tag)
            <li> <a href="{{ url('tags', ['tag' => $tag->name])}}">#{{ $tag->name }} </a></li>
        @endforeach
    </ul>
@endsection

