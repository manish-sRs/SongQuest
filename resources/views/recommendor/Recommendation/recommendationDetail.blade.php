@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="card_header">
                <a href="{{ route('recommender.song') }}" class="btn btn-warning" >Add song details</a>
                    <a href="{{ route('recommender.recommendation') }}" class="btn btn-warning" >Recommend a song </a>
                    <!-- <button class="btn btn-warning" onclick="">Recommendation Posts</button> -->
                    <button class="btn btn-warning" onclick="">Algorithm Recommendation</button>
                    <a class="btn btn-warning" href="{{ route('myrecommendation') }}">My Recommendation</a>
                </div>
                <div class="card-body">
                    <div>
                        <div>Recomendation Name: {{$recommendation->recommendation_name }}</div>
                        
                        <div>Recommended By: <span>{{$recommendation->user->name  }}</span></div>
                        <div class="">
                               <form action="{{route('giveRating')}}" method="post">  
                                @csrf  
                                        <input name="recommendation_id" type="hidden" value="{{$recommendation->id}}">
                                        <input id="input-1" name="rating" type="number" min='1' max='5'>
                                        <button class="btn btn-primary" >Submit</button>
                                </form>
                        </div>
                                
                        <div>Song</div>
                        <div><table class="table table-responsive">
                            <thead> 
                                <tr><th>Name</th>
                                   
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{$recommendation->rec_for_title }}</td>
                                   
                                    <td><a href="{{ route('recommendation.songs.detail', ['id' => $recommendation->rec_for_id]) }}" class="btn btn-success" >View</a> </td>
                                </tr>
                            </tbody>
                           
                        </table></div>
                        <div>recommendation 1</div>
                        <div><table class="table table-responsive">
                            <thead> 
                                <tr><th>Name</th>
                                   
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$recommendation->rec_1_title }}</td>
                                    
                                    <td><a href="{{ route('recommendation.songs.detail', ['id' => $recommendation->rec_1_id]) }}" class="btn btn-success" >View</a></td>
                                </tr>
                            </tbody>
                           
                        </table></div>
                        <div>recommendation 2</div>
                        <div><table class="table table-responsive">
                            <thead> 
                                <tr><th>Name</th>
                                    
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$recommendation->rec_2_title }}</td>
                                   
                                    <td><a href="{{ route('recommendation.songs.detail', ['id' => $recommendation->rec_2_id]) }}" class="btn btn-success" >View</a></td>
                                </tr>
                            </tbody>
                           
                        </table></div>
                        <div>recommendation 3</div>
                        <div><table class="table table-responsive">
                            <thead> 
                                <tr><th>Name</th>
                                   
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$recommendation->rec_3_title }}</td>
                                   
                                    <td><a href="{{ route('recommendation.songs.detail', ['id' => $recommendation->rec_3_id]) }}" class="btn btn-success" >View</a></td>
                                </tr>
                            </tbody>
                           
                        </table></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form  -->



@endsection
