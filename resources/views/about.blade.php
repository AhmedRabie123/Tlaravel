@extends('layout')
@section('title', 'about page')
@section('content')
    

<h1>about page</h1>

<ul>
    <li><a href="{{ route('home.page') }}">home</a></li>
    <li><a href="{{ route('about.page') }}">about</a></li>
</ul>

<b>
    this a about page
</b>

@endsection