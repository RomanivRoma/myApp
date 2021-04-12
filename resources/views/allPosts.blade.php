@extends('layouts.layout')

@section('title', 'Posts')

@section('content')
    <table>
        <td><h3>Author</h3></td>
        <td><h3>Theme</h3></td>
        <td><h3>Post</h3></td>
        @foreach($users as $id => $user)
            <tr>
                @if(str_contains(strtolower($post[$id]), 'birthday'))
                    <td> {{ $user }}</td>
                    <td><img class="cake" src="src/cake.png" alt="Birthday Cake"> {{ $theme[$id] }} <img class="cake" src="src/cake.png" alt="Birthday Cake"></td>
                    <td> {{ $post[$id] }}</td>
                @else
                    <td> {{ $user }}</td>
                    <td> {{ $theme[$id] }}</td>
                    <td> {{ $post[$id] }}</td>
                @endif

            </tr>
        @endforeach
        <tr>
            <form action="/allPosts" method="POST">
                <td><input type="text" id="name" name="name"></td>
                <td><input type="text" id="theme" name="theme"></td>
                <td><textarea type="text" id="post" name="post"> </textarea> <button>Post</button></td>
            </form>
        </tr>
    </table>
@endsection
