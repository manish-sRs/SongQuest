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
 

    <form class="needs-validation" method="POST" action="{{route('news.update')}}" style="padding-left: 20px; padding-top:10px;" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$news->id}}">
                        <input type="file" name="news_image" placeholder="Image">
                    <div class="form-row">
                        <!-- Title-->
                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Title</label>
                        <input type="text" class="form-control" value="{{ $news->title }}"  placeholder="Title" name="title" required>
    
                        <!--Body-->
                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Body</label>
                        <textarea  class="form-control" name="body"  id="validationTooltip02" placeholder=" Body of the news" required>{{ $news->body }}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Date</label>
                        <input type="date" name="date" value="{{ $news->date }}" class="form-control" id="validationTooltip03" placeholder="Date" required>
                        </div> 
                
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                    <br><br>
                    </form>
            </div>
        </div>
    </div>
</div>    
@endsection
