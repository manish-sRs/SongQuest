@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="card_header">
                <a href="{{ route('recommender.song') }}" class="btn btn-warning" >Add a song</a>
                    <a href="{{ route('recommender.recommendation') }}" class="btn btn-warning" >Recommend a song </a>
                    <button class="btn btn-warning" onclick="">Recommendation Posts</button>
                    <button class="btn btn-warning" onclick="">Algorithm Recommendation</button>
                    <button class="btn btn-warning" onClick="">My Recommendation</button>
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
                    

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form  -->



@endsection
