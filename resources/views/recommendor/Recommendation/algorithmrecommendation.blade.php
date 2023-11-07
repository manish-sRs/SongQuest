@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header" id="card_header">
                {{ __(' Algorithm Recommendation: ') }}
                |
                    <a href="{{ route('recommender.song') }}" class="btn btn-warning" >Add song details</a>
                    <a href="{{ route('recommender.recommendation') }}" class="btn btn-warning" >Create Recommendations </a>
                    <a class="btn btn-warning" href="{{ route('myrecommendation') }}">My Recommendation</a>
                    <a class="btn btn-warning" href="{{route('recommender.songview')}}">Songs</a>
                </div>
                <div>This is where algorithm works like a god:</div>
                <form class="needs-validation" method="get" action="" style="padding-left: 25px; padding-top:10px;">
                        @csrf
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation Name</label>
                        <input class="form-control" type="text" name="recommendation_name" id=""/>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation For</label>
                        <select class="form-control select2" name="song_id"  id="songSelect1">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($song as $item)
                            <option value="{{ $item->id }}" data-artist="@foreach($item->artists as $artist) {{ $artist->artist_name }}, @endforeach"
                            <?php echo ($song_id == $item->id )? 'selected' : '' ?> >
                             {{ $item->title }}
                            </option>
                        @endforeach
                        </select>
                        <div class="text-success" id="artistName1"></div>
                        </div><br>
                        <button class="btn btn-primary" type="submit">Generate Recommendation</button>
                        
                        <br><br>
                </form>
                        <!-- Recommendation View for the songs (Algorithm) -->
                        <table class="table table-striped table-responsive" id="recommendation_table">
                    <thead>
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Recommended For You:</th>
                            <th>Artists</th>
                            <th>Genre</th>
                            <th>Album</th>
                            <th>Year</th>
                            <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $counter = 1;
                    @endphp

                    @foreach ($recommendedSongs as $item)
                        <tr>
                            <th scope="row">{{ $counter }}</th>
                            <td>{{$item['title']}}</td>
                            <td>@foreach ($item->artists as $artist)
                                {{$artist->artist_name}},
                                @endforeach</td>
                            <td>{{ $item->genre->genre_name }}</td>
                            <td>{{$item['album']}}</td>
                            <td>{{$item['year']}}</td>
                            <td><a href="{{ route('recommendation.songs.detail', ['id' => $item['id']]) }} " class="btn btn-success" >View</a></td>
                            
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


<script>
    $(document).ready(function () {
        $('#songSelect1').change(function () {
            var selectedSong = $(this).find('option:selected');
            var artistNames = selectedSong.data('artist');
            var targetDivId = $(this).attr('id').replace('songSelect', 'artistName');
            $('#' + targetDivId).text('Artist: ' + artistNames);
        });
    });


    new DataTable('#recommendation_table');
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection