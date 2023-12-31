@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%; padding-top:12px;">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">{{ __('Songs') }}
                    |
                <a class="btn btn-warning" href="{{ route('admin.genre')}}" >Genre</a>
                <a class="btn btn-warning" href="{{route('adminRecView')}}">Recommendation</a>
                <a class="btn btn-warning" href="{{route('admin.news')}}">News</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                <!-- List of all the songs: -->
                <div style="font-size: larger; padding-top:12px; padding-bottom:10px; padding-left:5px">All Songs :</div>

                <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Artist name</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Album</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $counter = 1;
                @endphp

                @foreach($song as $item)
                <tr>
                        <th scope="row">{{ $counter }}</th>
                        <td>{{ $item->title }}</td> 
                        <td>@foreach ($item->artists as $artist)
                               {{$artist->artist_name}},
                             @endforeach
                          
                        </td>
                        <td>{{ $item->genre->genre_name }}</td>
                        <td>{{$item->album}}</td>
                        {{-- <td>{{ $item->artist_id }}</td> --}}
                        <td><a href="{{ route('admin.songs.detail', ['id' => $item->id]) }}" class="btn btn-success" >View</a> 
                        <a href="{{ route('admin.song.delete', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                        
                        </td>
                    </tr>
                    @php
                        $counter++;
                    @endphp
                @endforeach


                </tbody>
                </table>



@endsection                    