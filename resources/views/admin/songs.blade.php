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
                    