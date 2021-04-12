@extends('layouts.layout')


@section('content')
    <h1>{{ $theme }}</h1>
    <hr>
    <p> {{ $post }} </p>
    <h6>Author of post: {{ $user }} </h6>
@endsection

