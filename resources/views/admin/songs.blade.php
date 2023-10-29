@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%; padding-top:12px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                <a class="btn btn-warning" href="{{ route('admin.genre')}}" >Genre</a>
                <a class="btn btn-warning" >Users</a>
                <a class="btn btn-warning">Songs</a>
                <a class="btn btn-warning">Recommendation</a>
                <a class="btn btn-warning">Songs</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                <!-- List of all the songs: -->
                <div style="font-size: larger; padding-top:12px; padding-bottom:10px; padding-left:5px">Songs:</div>

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
                        <td></td>
                        <td>{{ $item->genre_id }}</td>
                        <td>{{$item->album}}</td>
                        <td><a href="#" class="btn btn-success" >Update</a> <a href="#" class="btn btn-primary">Delete</a>
                        
                        </td>
                    </tr>
                    @php
                        $counter++;
                    @endphp
                @endforeach


                </tbody>
                </table>



@endsection                    