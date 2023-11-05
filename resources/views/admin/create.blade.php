@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 100%; padding-top:12px;">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">{{ __('Add News') }}
                    |
                    <a class="btn btn-warning" href="{{ route('admin.genre')}}" >Genre</a>
                    <a class="btn btn-warning" href="{{route('admin.songs')}}">Songs</a>
                    <a class="btn btn-warning" href="{{route('adminRecView')}}">Recommendation</a>
                    <a class="btn btn-warning" href="{{ route('admin.news') }}"> News</a>
                </div>
                <!-- <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Title">
                    <textarea name="body" placeholder="Body"></textarea>
                    <input type="date" name="date" placeholder="Date">
                    <input type="file" name="news_image" placeholder="Image">
                    <button type="submit">Add News</button>
                </form> -->

                <form class="needs-validation" method="POST" action="{{ route('news.store') }}" style="padding-left: 20px; padding-top:10px;" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="news_image" placeholder="Image">
                    <div class="form-row">
                        <!-- Title-->
                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Title</label>
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Title" name="title" required>
    
                        <!--Body-->
                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Body</label>
                        <textarea  class="form-control" name="body"  id="validationTooltip02" placeholder=" Body of the news" required></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Date</label>
                        <input type="date" name="date" class="form-control" id="validationTooltip03" placeholder="Date" required>
                        </div> 
                
                    </div>
                    <button class="btn btn-primary" type="submit">Add news</button>
                    <br>
                    </form>

            </div>
        </div>
    </div>
</div>            


    
@endsection
