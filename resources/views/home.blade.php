@extends('layout')
@section('title', 'home page')
@section('content')

<h1>home page</h1>
<ul>
    <li><a href="{{ route('home.page') }}">home</a></li>
    <li><a href="{{ route('about.page') }}">about</a></li>
</ul>
<b>
    this a home page
</b>

@endsection