@extends('layouts.layout')

@section('title', 'Tags')

@section('content')
    <h1>Sort by tag: {{ $tag }}</h1>
    <br>
    <table>
        <td><h3>Author</h3></td>
        <td><h3>Theme</h3></td>
        <td><h3>Post</h3></td>
        @foreach($posts as $post)
             <tr>
                @foreach($post->tags as $tag)
                    @if($tagId == $tag->id)
                        <td> {{ $post->user->name }}</td>
                        <td> {{ $post->theme }}</td>
                        <td> <a href="{{ url('posts', ['id' => $post->id])}}"> {{ $post->body }} </a></td>
                    @endif
                 @endforeach
             </tr>
         @endforeach

    </table>
@endsection
