@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="card_header">
                    {{ __(' Add your recommendation here |') }}
                    
                    <a href="{{ route('recommender.song') }}" class="btn btn-warning" >Add song details</a>
                    
                    <button class="btn btn-warning" onclick="">Algorithm Recommendation</button>
                    <a class="btn btn-warning" href="{{ route('myrecommendation') }}">My Recommendation</a>
                    <a class="btn btn-warning" href="{{route('recommender.songview')}}">Songs</a>
                </div>

                <div class="card-body">
                    
                    <br><br>
                    <!-- form -->
                    <form class="needs-validation" method="post" action="{{ route('recommender.recommendation.create') }}" >
                        @csrf
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation Name</label>
                        <input class="form-control" type="text" name="recommendation_name" id=""/>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation For</label>
                        <select class="form-control select2" name="recommendation_for"  id="songSelect1">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($song as $item)
                            <option value="{{ $item->id }}" data-artist="@foreach($item->artists as $artist)
                                {{$artist->artist_name}}, 
                                @endforeach
                                ">{{ $item->title }}</option>
                        @endforeach
                        </select>
                        <div class="text-success" id="artistName1"></div>
                        </div><br><br>

                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation 1</label>
                        <select class="form-control select2" name="recommendation_1" id="songSelect2">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($song as $item)
                                <option value="{{ $item->id }}" data-artist="@foreach($item->artists as $artist)
                                    {{$artist->artist_name}}, 
                                    @endforeach
                                    ">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        <div class="text-success" id="artistName2"></div>

                        </div>
                        

                        
                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation 2</label>
                        <select class="form-control select2" name="recommendation_2"  id="songSelect3">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($song as $item)
                            <option value="{{ $item->id }}" data-artist="@foreach($item->artists as $artist)
                                {{$artist->artist_name}}, 
                                @endforeach
                                ">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        <div class="text-success" id="artistName3"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation 3</label>
                        <select class="form-control select2" name="recommendation_3" id="songSelect4">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($song as $item)
                                <option value="{{ $item->id }}" data-artist="@foreach($item->artists as $artist)
                                    {{$artist->artist_name}}, 
                                    @endforeach
                                    ">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        <div class="text-success" id="artistName4"></div>
                        </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Submit recommendation</button>
                    <br><br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $('.select2').select2();
});
$(document).ready(function () {
        $('#songSelect1, #songSelect2, #songSelect3,  #songSelect4').change(function () {
            var selectedSong = $(this).find('option:selected');
            var artistNames = selectedSong.data('artist');
            var targetDivId = $(this).attr('id').replace('songSelect', 'artistName');
            $('#' + targetDivId).text('Artist: ' + artistNames);
        });
    });

</script>


@endsection
