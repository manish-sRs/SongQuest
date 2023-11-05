@extends('layouts.app')

@section('content')
<!---->
    <h1>Edit News</h1>
    <form action="{{route('news.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="id" value="{{$news->id}}">
        <input type="text" name="title" value="{{ $news->title }}" placeholder="Title">
        <textarea name="body" placeholder="Body">{{ $news->body }}</textarea>
        <input type="date" name="date" value="{{ $news->date }}" placeholder="Date">
        <input type="file" name="news_image" placeholder="Image">
        <button type="submit">Update News</button>
    </form>
@endsection
