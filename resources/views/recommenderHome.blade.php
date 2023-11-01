@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="card_header">
                <a href="{{ route('recommender.song') }}" class="btn btn-warning" >Add song details</a>
                    <a href="{{ route('recommender.recommendation') }}" class="btn btn-warning" >Recommend a song </a>
                    <button class="btn btn-warning" onclick="">Algorithm Recommendation</button>
                    <a class="btn btn-warning" href="{{ route('myrecommendation') }}">My Recommendation</a>
                    <a class="btn btn-warning" href="{{route('recommender.songview')}}">Songs</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{$msg}} {{ Auth::user()->name ,}}
                    {{ __('You are logged in!') }}
                    <br><br>
                    
                    <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Recommendation Name</th>
                            <th scope="col">song</th>
                            <th scope="col">Recommendation 1</th>
                            <th scope="col">Recommendation 2</th>
                            <th scope="col">Recommendation 3</th>
                            <th scope="col">Description</th>
                            <th scope="col">User</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $counter = 1;
                    @endphp

                    @foreach($recommendations as $recommendation)
                        <tr>
                            <th scope="row">{{ $counter }}</th>
                            <td>{{ $recommendation->recommendation_name }}</td> 
                            <td>{{ $recommendation->recommendation_for_name }}</td>
                            <td>{{ $recommendation->recommendation_1_name }}</td>
                            <td>{{ $recommendation->recommendation_2_name }}</td>
                            <td>{{ $recommendation->recommendation_3_name }}</td>
                            <td>{{ $recommendation->description}}</td>
                            <td>{{ $recommendation->user->name }}</td>
                            <td><a href="#" class="btn btn-primary update-genre" >View</a>
                            
                            </td>
                        </tr>
                        @php
                            $counter++;
                        @endphp
                    @endforeach
 
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form  -->



@endsection
