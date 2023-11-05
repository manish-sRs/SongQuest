@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header" id="card_header">
                    {{ __(' Songs ') }}
                      |
                        <a href="{{ route('recommender.song') }}" class="btn btn-warning" >Add song details</a>
                        <a href="{{ route('recommender.recommendation') }}" class="btn btn-warning" >Create Recommendations </a>
                        <a class="btn btn-warning" href="{{route('algoRecommendation')}}">Algorithm Recommendation</a>
                        <a class="btn btn-warning" href="{{ route('myrecommendation') }}">My Recommendation</a>
                </div>
            </div>
        </div>
    </div>
</div>                    



<div class="container" style="padding-bottom: 40px; padding-top:20px;">
  <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>

<!-- List of all the songs: -->
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
            <td><a href="{{ route('recommendation.songs.detail', ['id' => $item->id]) }} " class="btn btn-success" >View</a>
            
            </td>
        </tr>
        @php
            $counter++;
        @endphp
    @endforeach


</tbody>
</table>



@endsection