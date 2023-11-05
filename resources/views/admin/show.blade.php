@extends('layouts.app')

@section('content')
    <h1>{{ $news->title }}</h1>
    <p>{{ $news->body }}</p>
    <p>{{ $news->date }}</p>
    <img src="{{ asset('storage/'.$news->news_image) }}" alt="">
    <a href="{{ route('news.edit', $news->id) }}">Edit</a>
    <a href="{{ route('news.destroy', $news->id) }}">Delete</a>
@endsection
