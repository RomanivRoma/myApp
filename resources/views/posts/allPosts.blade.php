@extends('layouts.layout')

@section('title', 'Posts')

@section('content')
    <table>
        <td><h3>Author</h3></td>
        <td><h3>Theme</h3></td>
        <td><h3>Post</h3></td>
        <td><h3>Tags</h3></td>

        @foreach($posts as $post)
            <tr>
                @if(str_contains(strtolower($post->theme), 'birthday'))
                    <td> {{ $post->user_id }}</td>
                    <td><img class="cake" src="src/cake.png" alt="Birthday Cake"> {{ $post->theme }} <img class="cake" src="src/cake.png" alt="Birthday Cake"></td>
                    <td> {{ $post->body }}</td>
                @else
                    <td> {{ $post->user->name }}</td>
                    <td> {{ $post->theme }}</td>
                    <td> <a href="{{ url('posts', ['id' => $post->id])}}"> {{ $post->body }} </a></td>
                    <td>
                        <ul class="tags-table">
                            @foreach ($post->tags as $tag)
                                <li> <a href="{{ url('tags', ['tag' => $tag->name])}}">#{{ $tag->name }} </a></li>
                            @endforeach
                        </ul>
                    </td>
                @endif

            </tr>
        @endforeach
        <tr>
            <form method="POST" action="posts" accept-charset="UTF-8">
                @csrf
                <td><input type="text" id="name" name="name"></td>
                <td>
                    <select id="theme" name="theme">
                        @foreach ($themes as $theme)
                            <option value="{{ $theme->name }}">{{ $theme->name }}</option>
                        @endforeach
                        </select>
                </td>
                <td><textarea type="text" id="post" name="post"> </textarea> </td>
                <td><textarea type="text" id="tag" name="tag"> </textarea> <button type="submit">Post</button></td>
            </form>
        </tr>
    </table>
@endsection
