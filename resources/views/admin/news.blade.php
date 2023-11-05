@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 100%; padding-top:12px;">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">{{ __('News') }}
                    |
                    <a class="btn btn-warning" href="{{ route('admin.genre')}}" >Genre</a>
                    <a class="btn btn-warning" href="{{route('admin.songs')}}">Songs</a>
                    <a class="btn btn-warning" href="{{route('adminRecView')}}">Recommendation</a>
                    <a class="btn btn-warning" href="{{ route('news.create') }}">Add News</a>
                </div>

                <!-- Data table to display the news: -->
                <table class="table table-striped table-responsive" id="recommendation_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">News Title</th>
                            <th scope="col">Body</th>
                            <th scope="col">Added Date </th>
                            <th scope="col">Images</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $counter = 1;
                    @endphp

                    @foreach($news as $n)
                        <tr>
                            <th scope="row">{{ $counter }}</th>
                            <td>{{ $n->title }}</td> 
                            <td>{{ $n->body }}</td>
                            <td>{{ $n->date }}</td>
                            <td><img src="{{ asset('images/'.$n->news_image) }}" alt=""></td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.edit', $n->id) }}">Edit</a>
                                <a class="btn btn-danger" href="{{ route('news.destroy', $n->id) }}">Delete</a>
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

@endsection