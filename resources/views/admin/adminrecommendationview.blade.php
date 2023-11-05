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
                    <a class="btn btn-warning" href="{{route('admin.news')}}">News</a>
                    
                </div>
                
            <div class="card-body">
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
                            <td><a href="{{ route('viewRecAdmin', ['id' => $recommendation->id])}}" class="btn btn-primary update-genre" >View</a>
                                <a href="{{route('adminRec.delete',['id' => $recommendation->id])}}" class="btn btn-danger">Delete</a>
                            
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
@endsection