@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%; padding-top:12px;">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">

                <div class="card-header">{{ __('Recommendations') }}
                    |
                    <a class="btn btn-warning" href="{{ route('admin.genre')}}" >Genre</a>
                    <a class="btn btn-warning" href="{{route('admin.songs')}}">Songs</a>
                    <a class="btn btn-warning" href="{{route('adminRecView')}}">Recommendation</a>
                    <a class="btn btn-warning" href="{{route('admin.news')}}">News</a>
                    
                </div>
            </div>    
            <div class="card-body">

            <div><br>
                        <div>Recomendation Name: <strong>{{$recommendation->recommendation_name }}</strong></div>
                        
                        <div>Recommended By: <strong>{{$recommendation->user->name  }}</strong></div>
                              
                       <br><br>
                       <strong>Recommended for:</strong>
                        <div><table class="table table-responsive">
                            <thead> 
                                <tr><th>Name</th>
                                   
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{$recommendation->rec_for_title }}</td>
                                   
                                    <td><a href="{{ route('admin.songs.detail', ['id' => $recommendation->rec_for_id]) }}" class="btn btn-success" >View</a> </td>
                                </tr>
                            </tbody>
                           
                        </table></div>
                        <div><strong>Recommendation 1</strong></div>
                        <div><table class="table table-responsive">
                            <thead> 
                                <tr><th>Name</th>
                                   
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$recommendation->rec_1_title }}</td>
                                    
                                    <td><a href="{{ route('admin.songs.detail', ['id' => $recommendation->rec_1_id]) }}" class="btn btn-success" >View</a></td>
                                </tr>
                            </tbody>
                           
                        </table></div>
                        <div><strong>Recommendation 2</strong></div>
                        <div><table class="table table-responsive">
                            <thead> 
                                <tr><th>Name</th>
                                    
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$recommendation->rec_2_title }}</td>
                                   
                                    <td><a href="{{ route('admin.songs.detail', ['id' => $recommendation->rec_2_id]) }}" class="btn btn-success" >View</a></td>
                                </tr>
                            </tbody>
                           
                        </table></div>
                        <div><strong>Recommendation 3</strong></div>
                        <div><table class="table table-responsive">
                            <thead> 
                                <tr><th>Name</th>
                                   
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$recommendation->rec_3_title }}</td>
                                   
                                    <td><a href="{{ route('admin.songs.detail', ['id' => $recommendation->rec_3_id]) }}" class="btn btn-success" >View</a></td>
                                </tr>
                            </tbody>
                           
                        </table></div>
                    </div>



            </div>
        </div>
    </div>
</div>        

@endsection