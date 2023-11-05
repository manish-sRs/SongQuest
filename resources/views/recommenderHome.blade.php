@extends('layouts.app')

@section('content')



<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header" id="card_header">
                <a href="{{ route('recommender.song') }}" class="btn btn-warning" >Add song details</a>
                    <a href="{{ route('recommender.recommendation') }}" class="btn btn-warning" >Recommend a song </a>
                    <a class="btn btn-warning" href="{{route('algoRecommendation')}}">Algorithm Recommendation</a>
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
                    
                    <table class="table table-striped table-responsive" id="recommendation_table">
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
                            <th scope="col">Action</th>
                            <th scope="col">Rating</th>
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
                            <td><a href="{{ route('recommender.profile',['id'=>$recommendation->user_id])}}">{{ $recommendation->user->name }}</a></td>
                            <td><a href="{{ route('recommendation_detail', ['id' => $recommendation->id])}}" class="btn btn-primary update-genre" >View</a>
                            </td>
                            <td>{{ $recommendation->rating_avg_rating }}</td>
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

<script>
    new DataTable('#recommendation_table');

    
 

</script>

@endsection
