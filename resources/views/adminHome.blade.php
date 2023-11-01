@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%; padding-top:12px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                <a class="btn btn-warning" href="{{ route('admin.genre')}}" >Genre</a>
                <a class="btn btn-warning" href="{{route('admin.songs')}}">Songs</a>
                <a class="btn btn-warning">Recommendation</a>
                <a class="btn btn-warning">Songs</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->name }}
                    
                    {{$msg}}
                    {{ __('You are logged in!') }}

                    <!-- Users of the system: -->
                    <div style="font-size: larger; padding-top:12px; padding-bottom:10px; padding-left:5px">List of all the users</div>

                    <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $counter = 1;
                    @endphp

                    @foreach($users as $user)
                    <tr>
                            <th scope="row">{{ $counter }}</th>
                            <td>{{ $user->name }}</td> 
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td><a href="#" class="btn btn-primary" >Update</a> <a href="#" class="btn btn-danger">Delete</a>
                            
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
