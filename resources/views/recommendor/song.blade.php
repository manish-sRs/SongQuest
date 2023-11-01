@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="card_header">
                    {{ __(' Add a Song') }}
                    <a href="{{ route('recommender.recommendation') }}" class="btn btn-warning" >Recommend a song </a>
                    <button class="btn btn-warning" onclick="">Algorithm Recommendation</button>
                    <a class="btn btn-warning" href="{{ route('myrecommendation') }}">My Recommendation</a>
                    <a class="btn btn-warning" href="{{route('recommender.songview')}}">Songs</a>
                </div>

                <div class="card-body">
                    
                    <br><br>
                    <!-- form -->
                    <form class="needs-validation" method="post" action="{{ route('recommender.song.create') }}" >
                        @csrf
                    <div class="form-row">
                        <!-- Name-->
                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Song Title</label>
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Song title" name="song_title" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                        <div class="invalid-tooltip">
                            Please put the name of the song(title).
                            </div>
                        </div>

                        <!--Artist name-->
                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Artist(s) name</label>
                        <input type="text" class="form-control" name="artist_name"  id="validationTooltip02" placeholder=" Multiple artists name must be seperated by comma','" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                        </div>

                        
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Album</label>
                        <input type="text" name="album" class="form-control" id="validationTooltip03" placeholder="Album" required>
                        
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="validationTooltip04">Year</label>
                        <input type="text" name="year" class="form-control" id="validationTooltip04" placeholder="1999" required>
                        
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="validationTooltip05">Genre</label>
                        <select class="form-control" name="genre_id" id="">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($genre as $item)
                                <option value="{{ $item->id }}">{{ $item->genre_name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <label class="text-danger">* If the song already exists in the database than go to the "Existing Song Recommendation" and search the song in there !</label>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="Song Link">Youtube Link</label>
                            <input type="text" id="youtube-link" class="form-control" placeholder="youtube link" name="link">
                              <label for="" class="text-danger" id="error-message">*Must be a YouTube link</label>
                        </div>
                    </div><br>
                    <button class="btn btn-primary" type="submit">Submit recommendation</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form  -->

<script>
    document.getElementById('youtube-link').addEventListener('input', function() {
        var youtubeLink = document.getElementById('youtube-link').value;
        var errorMessage = document.getElementById('error-message');
        
        // Regular expression to match YouTube video URLs
        var youtubeRegExp = /^(https?:\/\/)?(www\.)?(youtube|youtu|youtube-nocookie)\.(com|be)\/(watch\?v=|embed\/|v\/|.+\?v=)?([^&=%\?]{11})/;
        
        if (youtubeRegExp.test(youtubeLink)) {
            errorMessage.style.display = 'none'; // Hide error message if it's a valid YouTube link
        } else {
            errorMessage.style.display = 'block'; // Show error message if it's not a valid YouTube link
        }
    });
</script>

@endsection
